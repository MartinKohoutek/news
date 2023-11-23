<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function SeoSiteSetting() {
        $seo = SeoSetting::find(1);
        return view('backend.seo.seo_data', compact('seo'));
    }

    public function UpdateSeoSetting(Request $request, $id) {
        $seo = SeoSetting::findOrFail($id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'SEO Settings Updated Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
