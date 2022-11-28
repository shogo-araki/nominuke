<?php

namespace App\Services;

use App\Repositories\FetchDataRepositoryInterface;

class S3GetDataService implements GetDataServiceInterface
{
    private FetchDataRepositoryInterface $s3_object;

    public function __construct(FetchDataRepositoryInterface $s3_object)
    {
        $this->s3_object = $s3_object;
    }

    public function getSoundsData(string $path)
    {
        return $this->s3_object->fetchObject($path);
    }
}