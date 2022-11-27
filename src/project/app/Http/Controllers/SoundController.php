<?php

namespace App\Http\Controllers;

use App\Services\GetDataServiceInterface;

class SoundController extends Controller
{
    private GetDataServiceInterface $getData;

    public function __construct(GetDataServiceInterface $getData)
    {
        $this->getData = $getData;
    }

    public function index()
    {
        $sound = $this->getData->getSoundsData();
        dd($sound);
        return view('index', [$sound]);
    }
}
