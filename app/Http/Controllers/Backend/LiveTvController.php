<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LiveTV;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class LiveTvController extends Controller
{
    public function UpdateLiveTv() {
        $liveTV = LiveTV::findOrFail(1);
        return view('backend.livetv.live_tv', compact('liveTV'));
    }

    public function StoreLiveTv(Request $request) {
        $liveTV = LiveTV::findOrFail($request->id);

        if ($request->file('live_image')) {
            $image = $request->file('live_image');
            @unlink($liveTV->live_image);
            $imgName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $imgUrl = 'upload/livetv/'.$imgName;
            Image::make($image)->resize(720, 450)->save($imgUrl);
            $liveTV->update(['live_image' => $imgUrl]);
        }

        $liveTV->update([
            'live_url' => $request->live_url,
            'post_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'LiveTV Updated Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
