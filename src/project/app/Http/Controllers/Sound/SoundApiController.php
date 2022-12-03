<?php

namespace App\Http\Controllers\Sound;

use App\Http\Controllers\Controller;
use App\Services\GetDataServiceInterface;
use AWS\CRT\HTTP\Request;

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
        return response()->json($sound);
    }

    public function getSoundList()
    {
        $data = $this->getData->getSoundList()['Contents'];
        // dd($data);
        return $data;
    }
}
