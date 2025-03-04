<?php

namespace App\Repositories;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;

class S3ClientRepository implements FetchDataRepositoryInterface
{
    private $s3;
    private $bucket;

    public function __construct()
    {
        $credentials = [
            'key' => env('AWS_ACCESS_KEY_ID', ''),
            'secret' => env('AWS_SECRET_ACCESS_KEY', ''),
        ];

        $bucket_version = 'latest';
        $bucket_region = env('AWS_DEFAULT_REGION', '');
        $this->bucket = env('AWS_BUCKET', '');

        $this->s3 = new S3Client([
            'credentials' => $credentials,
            'region'  => $bucket_region,
            'version' => $bucket_version,
        ]);
    }

    public function fetchObject(string $path)
    {
        $params = [
            'Bucket' => $this->bucket,
            'Key' => $path,
        ];

        try {
            return $this->s3->getObject($params);
        } catch (S3Exception $e) {
            throw $e->getMessage();
        }
    }

    public function fetchObjectList()
    {
        try {
            return $this->s3->ListObjects([
                'Bucket' => $this->bucket,
                // 'Prefix' => 'path/directory',
            ]);
        } catch (S3Client $e) {
            throw $e->getMessage();
        }
    }
}
