<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::all();
        return view('videos/index', [
            'video' => $video
        ]);
    }

    public function detail($id)
    {
        $video = Video::findOrFail($id);
        return view('videos/detail', [
            'video' => $video
        ]);
    }
}
