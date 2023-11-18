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
        $banners = Banner::findOrFail($banner_id);

        if (!($request->file('home_one') || $request->file('home_two') || $request->file('home_three') 
            || $request->file('right_sidebar') || $request->file('news_details_one') || $request->file('news_category_one'))) {
            $notification = [
                'alert-type' => 'info',
                'message' => 'No Banner Changed!'
            ];
            return redirect()->back()->with($notification);
        }

        if ($request->file('home_one')) {
            $img1 = $request->file('home_one');
            unlink($banners->home_one);
            $imgName1 = hexdec(uniqid()).'.'.$img1->getClientOriginalExtension();
            Image::make($img1)->resize(620, 80)->save('upload/banners/'.$imgName1);
            $saveUrl1 = 'upload/banners/'.$imgName1;
            $banners->update(['home_one' => $saveUrl1]);
        }

        if ($request->file('home_two')) {
            $img2 = $request->file('home_two');
            unlink($banners->home_two);
            $imgName2 = hexdec(uniqid()).'.'.$img2->getClientOriginalExtension();
            Image::make($img2)->resize(620, 80)->save('upload/banners/'.$imgName2);
            $saveUrl2 = 'upload/banners/'.$imgName2;
            $banners->update(['home_two' => $saveUrl2]);
        }

        if ($request->file('home_three')) {
            $img3 = $request->file('home_three');
            unlink($banners->home_three);
            $imgName3 = hexdec(uniqid()).'.'.$img3->getClientOriginalExtension();
            Image::make($img3)->resize(620, 80)->save('upload/banners/'.$imgName3);
            $saveUrl3 = 'upload/banners/'.$imgName3;
            $banners->update(['home_three' => $saveUrl3]);
        }

        if ($request->file('right_sidebar')) {
            $img4 = $request->file('right_sidebar');
            unlink($banners->right_sidebar);
            $imgName4 = hexdec(uniqid()).'.'.$img4->getClientOriginalExtension();
            Image::make($img4)->resize(300, 250)->save('upload/banners/'.$imgName4);
            $saveUrl4 = 'upload/banners/'.$imgName4;
            $banners->update(['right_sidebar' => $saveUrl4]);
        }

        if ($request->file('news_details_one')) {
            $img5 = $request->file('news_details_one');
            unlink($banners->news_details_one);
            $imgName5 = hexdec(uniqid()).'.'.$img5->getClientOriginalExtension();
            Image::make($img5)->resize(620, 80)->save('upload/banners/'.$imgName5);
            $saveUrl5 = 'upload/banners/'.$imgName5;
            $banners->update(['news_details_one' => $saveUrl5]);
        }

        if ($request->file('news_category_one')) {
            $img6 = $request->file('news_category_one');
            unlink($banners->news_category_one);
            $imgName6 = hexdec(uniqid()).'.'.$img6->getClientOriginalExtension();
            Image::make($img6)->resize(620, 80)->save('upload/banners/'.$imgName6);
            $saveUrl6 = 'upload/banners/'.$imgName6;
            $banners->update(['news_category_one' => $saveUrl6]);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Banners Updated Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
