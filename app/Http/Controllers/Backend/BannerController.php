<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class BannerController extends Controller
{
    public function AllBanners() {
        $banners = Banner::findOrFail(1);
        return view('backend.banner.banner_update', compact('banners'));
    }

    public function UpdateBanners(Request $request) {
        $banner_id = $request->id;

        if ($request->file('home_one')) {
            $img1 = $request->file('home_one');
            $imgName1 = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
            Image::make($img1)->resize(620, 80)->save('upload/banners/'.$imgName1);
            $saveUrl1 = 'upload/banners/'.$imgName1;
            Banner::findOrFail($banner_id)->update(['home_one' => $saveUrl1]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Banner Updated Successfully1',
            ];
            return redirect()->back()->with($notification);
        }

        if ($request->file('home_two')) {
            $img2 = $request->file('home_two');
            $imgName2 = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
            Image::make($img2)->resize(620, 80)->save('upload/banners/'.$imgName2);
            $saveUrl2 = 'upload/banners/'.$imgName2;
            Banner::findOrFail($banner_id)->update(['home_two' => $saveUrl2]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Banner Updated Successfully1',
            ];
            return redirect()->back()->with($notification);
        }

        if ($request->file('home_three')) {
            $img3 = $request->file('home_three');
            $imgName3 = hexdec(uniqid()).'.'.$img3->getClientOriginalExtension();
            Image::make($img3)->resize(620, 80)->save('upload/banners/'.$imgName3);
            $saveUrl3 = 'upload/banners/'.$imgName3;
            Banner::findOrFail($banner_id)->update(['home_three' => $saveUrl3]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Banner Updated Successfully1',
            ];
            return redirect()->back()->with($notification);
        }

        if ($request->file('right_sidebar')) {
            $img4 = $request->file('right_sidebar');
            $imgName4 = hexdec(uniqid()).'.'.$img4->getClientOriginalExtension();
            Image::make($img4)->resize(300, 250)->save('upload/banners/'.$imgName4);
            $saveUrl4 = 'upload/banners/'.$imgName4;
            Banner::findOrFail($banner_id)->update(['right_sidebar' => $saveUrl4]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Banner Updated Successfully1',
            ];
            return redirect()->back()->with($notification);
        }

        if ($request->file('news_details_one')) {
            $img5 = $request->file('news_details_one');
            $imgName5 = hexdec(uniqid()).'.'.$img5->getClientOriginalExtension();
            Image::make($img5)->resize(620, 80)->save('upload/banners/'.$imgName5);
            $saveUrl5 = 'upload/banners/'.$imgName5;
            Banner::findOrFail($banner_id)->update(['news_details_one' => $saveUrl5]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Banner Updated Successfully1',
            ];
            return redirect()->back()->with($notification);
        }

        if ($request->file('news_category_one')) {
            $img6 = $request->file('news_category_one');
            $imgName6 = hexdec(uniqid()).'.'.$img6->getClientOriginalExtension();
            Image::make($img6)->resize(620, 80)->save('upload/banners/'.$imgName6);
            $saveUrl6 = 'upload/banners/'.$imgName6;
            Banner::findOrFail($banner_id)->update(['news_category_one' => $saveUrl6]);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Banner Updated Successfully1',
            ];
            return redirect()->back()->with($notification);
        }
    }
}
