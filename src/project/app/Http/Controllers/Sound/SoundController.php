<?php

namespace App\Http\Controllers\Sound;

use App\Http\Controllers\Controller;
use App\Http\Requests\SoundRequests;
use Illuminate\Http\Request;

class SoundController extends Controller
{
    public function index()
    {
        return view('sound.index');
    }

    public function add()
    {
        return view('sound.add');
    }

    public function store(SoundRequests $request){
        // s3へ保存する処理
    }
}
