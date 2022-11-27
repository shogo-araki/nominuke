<?php

namespace App\Repositories;

interface FetchDataRepositoryInterface
{
    public function fetchObject(string $path, string $saveAs);
}