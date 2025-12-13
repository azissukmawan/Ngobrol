<?php
class MinioClient
{
    private string $endpoint;
    private string $bucket;
    private string $accessKey;
    private string $secretKey;
    private string $region;

    public function __construct()
    {
        $this->endpoint = MINIO_ENDPOINT;
        $this->bucket = MINIO_BUCKET;
        $this->accessKey = MINIO_ACCESS_KEY;
        $this->secretKey = MINIO_SECRET_KEY;
        $this->region = MINIO_REGION;
    }

    public function isConfigured(): bool
    {
        return $this->endpoint && $this->bucket && $this->accessKey && $this->secretKey;
    }

    public function putObject(string $key, string $localPath, string $contentType = 'application/octet-stream')
    {
        if (!$this->isConfigured()) {
            return false;
        }

        $url = $this->buildPresignedUrl('PUT', $key, 900);
        if (!$url) {
            return false;
        }

        $fp = fopen($localPath, 'rb');
        if ($fp === false) {
            return false;
        }

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_PUT => true,
            CURLOPT_INFILE => $fp,
            CURLOPT_INFILESIZE => filesize($localPath),
            CURLOPT_HTTPHEADER => ["Content-Type: {$contentType}"],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => MINIO_USE_SSL,
            CURLOPT_SSL_VERIFYHOST => MINIO_USE_SSL ? 2 : 0,
            CURLOPT_TIMEOUT => 30,
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        if ($response === false) {
            error_log('[minio] curl error: ' . curl_error($ch));
        }
        if ($httpCode && $httpCode >= 400) {
            error_log('[minio] upload failed code=' . $httpCode . ' key=' . $key . ' resp=' . substr((string)$response, 0, 500));
        }
        curl_close($ch);
        fclose($fp);

        if ($httpCode >= 200 && $httpCode < 300) {
            return $this->objectUrl($key);
        }

        return false;
    }

    public function objectUrl(string $key): string
    {
        $encodedKey = str_replace('%2F', '/', rawurlencode($key));
        return rtrim($this->endpoint, '/') . '/' . $this->bucket . '/' . $encodedKey;
    }

    private function buildPresignedUrl(string $method, string $key, int $expires): ?string
    {
        $host = parse_url($this->endpoint, PHP_URL_HOST);
        if (!$host) {
            return null;
        }

        $algorithm = 'AWS4-HMAC-SHA256';
        $service = 's3';
        $now = new DateTime('now', new DateTimeZone('UTC'));
        $amzDate = $now->format('Ymd\THis\Z');
        $dateScope = $now->format('Ymd');
        $credentialScope = "$dateScope/{$this->region}/{$service}/aws4_request";

        $canonicalUri = '/' . $this->bucket . '/' . str_replace('%2F', '/', rawurlencode($key));
        $query = [
            'X-Amz-Algorithm' => $algorithm,
            'X-Amz-Credential' => $this->accessKey . '/' . $credentialScope,
            'X-Amz-Date' => $amzDate,
            'X-Amz-Expires' => $expires,
            'X-Amz-SignedHeaders' => 'host',
        ];
        ksort($query);

        $canonicalQuery = http_build_query($query, '', '&', PHP_QUERY_RFC3986);
        $canonicalHeaders = 'host:' . $host . "\n";
        $signedHeaders = 'host';
        $payloadHash = 'UNSIGNED-PAYLOAD';

        $canonicalRequest = implode("\n", [
            $method,
            $canonicalUri,
            $canonicalQuery,
            $canonicalHeaders,
            $signedHeaders,
            $payloadHash,
        ]);

        $stringToSign = implode("\n", [
            $algorithm,
            $amzDate,
            $credentialScope,
            hash('sha256', $canonicalRequest),
        ]);

        $signingKey = $this->getSigningKey($dateScope, $service);
        $signature = hash_hmac('sha256', $stringToSign, $signingKey);

        // Build final query without double-encoding credential
        $query['X-Amz-Credential'] = rawurlencode($this->accessKey . '/' . $credentialScope);
        $query['X-Amz-Signature'] = $signature;
        $finalQuery = http_build_query($query, '', '&', PHP_QUERY_RFC3986);

        return rtrim($this->endpoint, '/') . $canonicalUri . '?' . $finalQuery;
    }

    private function getSigningKey(string $date, string $service): string
    {
        $kDate = hash_hmac('sha256', $date, 'AWS4' . $this->secretKey, true);
        $kRegion = hash_hmac('sha256', $this->region, $kDate, true);
        $kService = hash_hmac('sha256', $service, $kRegion, true);
        return hash_hmac('sha256', 'aws4_request', $kService, true);
    }
}
