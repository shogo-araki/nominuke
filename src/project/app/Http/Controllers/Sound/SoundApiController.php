<?php

namespace App\Http\Controllers\Sound;

use App\Http\Controllers\Controller;
use App\Services\GetDataServiceInterface;
use AWS\CRT\HTTP\Request;
use Illuminate\Support\Facades\Storage;

class SoundApiController extends Controller
{
    private GetDataServiceInterface $getData;

    public function __construct(GetDataServiceInterface $getData)
    {
        $this->getData = $getData;
    }

    public function getSound(Request $request)
    {
        $sound = $this->getData->getSoundsData($request->path);
        // Storage::put('aaa.mp3', $sound['Body']);
        return response()->json($sound);
    }

}
