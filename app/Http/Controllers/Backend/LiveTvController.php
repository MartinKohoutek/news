<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LiveTV;
use Illuminate\Http\Request;

class LiveTvController extends Controller
{
    public function UpdateLiveTv() {
        $liveTV = LiveTV::findOrFail(1);
        return view('backend.livetv.live_tv', compact('liveTV'));
    }
}
