<?php

namespace App\Repositories;

interface FetchDataRepositoryInterface
{
    public function fetchObject(string $path);
    public function fetchObjectList();
}