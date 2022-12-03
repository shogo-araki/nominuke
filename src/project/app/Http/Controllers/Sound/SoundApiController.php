<?php

namespace App\Http\Controllers\Sound;

use App\Http\Controllers\Controller;
use App\Services\GetDataServiceInterface;
use Illuminate\Http\Request;
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
        // 再生できるようにする
        if (!Storage::exists($request->path)) {
            $sound = $this->getData->getSoundsData($request->path)['Body'];
            Storage::put($request->path, $sound);
        }
        return Storage::get($request->path);
    }

    public function getSoundList()
    {
        $data = $this->getData->getSoundList()['Contents'];
        return $data;
    }
}
