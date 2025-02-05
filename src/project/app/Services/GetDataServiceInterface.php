<?php

namespace App\Services;

interface GetDataServiceInterface
{
    public function getSoundsData(string $path);
    public function getSoundList();
}