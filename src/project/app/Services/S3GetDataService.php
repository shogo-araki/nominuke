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

    public function getSoundsData()
    {
        // 後で動的にファイル名を変えられるようにする
        return $this->s3_object->fetchObject('clapolka.mp3', 'clapolka.mp3');
    }
}