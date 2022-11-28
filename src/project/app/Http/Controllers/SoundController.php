<?php

namespace App\Http\Controllers;

use App\Services\GetDataServiceInterface;
use Illuminate\Support\Facades\Storage;

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
        Storage::put('aaa.mp3', $sound['Body']);
        dd($sound['Body']);
        return view('index', [$sound]);
    }
}
