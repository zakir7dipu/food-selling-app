<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mainbannerstore(Request $request)
    {
//        dd($request);
        $app_image_id = Banner::where('name','Bannar Main')->get('id');
        $app_image_id = json_decode(json_encode($app_image_id),true);
        if ($app_image_id != null) {
            $app_image_id = $app_image_id[0]['id'];
        }
//        dd($app_image_id);
        if($app_image_id == null) {
            $this->validate($request,[
                'banner'=>'required|max:1',
                'meta_keyword_first'=>'required',
                'meta_keyword_second'=>'required'
            ]);
            $app_banner = new Banner();
            $app_banner->name = 'Bannar Main';
            $app_banner->meta_keyword_first = $request->meta_keyword_first;
            $app_banner->meta_keyword_second = $request->meta_keyword_second;
            if ($request->hasFile('banner')) {
                $images = $request->banner;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(1920, 900)->save(public_path('/upload/images/banners/' . $filename));
                    $app_banner->image = $filename;
                }
            }
            $app_banner->save();
        }else{
            $app_banner = Banner::find($app_image_id);
            $app_banner->name = 'Bannar Main';
            $app_banner->meta_keyword_first = $request->meta_keyword_first;
            $app_banner->meta_keyword_second = $request->meta_keyword_second;
            if ($request->hasFile('banner')) {
                $image = $app_banner->image;
                $path = 'upload/images/banners/'.$image;
                unlink($path);
                $images = $request->banner;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(1920, 900)->save(public_path('/upload/images/banners/' . $filename));
                    $app_banner->image = $filename;
                }
            }
            $app_banner->save();
        }
        return back();
    }

    public function secondbannarstore(Request $request)
    {
        $app_image_id = Banner::where('name', 'Bannar Second')->get('id');
        $app_image_id = json_decode(json_encode($app_image_id), true);
        if ($app_image_id != null) {
            $app_image_id = $app_image_id[0]['id'];
        }
        if ($app_image_id == null) {
            $this->validate($request, [
                'banner' => 'required|max:1',
                'meta_keyword_first' => 'required',
                'meta_keyword_second' => 'required'
            ]);
            $app_banner = new Banner();
            $app_banner->name = 'Bannar Second';
            $app_banner->meta_keyword_first = $request->meta_keyword_first;
            $app_banner->meta_keyword_second = $request->meta_keyword_second;
            if ($request->hasFile('banner')) {
                $images = $request->banner;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(1920, 452)->save(public_path('/upload/images/banners/' . $filename));
                    $app_banner->image = $filename;
                }
            }
            $app_banner->save();
        } else {
            $app_banner = Banner::find($app_image_id);
            $app_banner->name = 'Bannar Second';
            $app_banner->meta_keyword_first = $request->meta_keyword_first;
            $app_banner->meta_keyword_second = $request->meta_keyword_second;
            if ($request->hasFile('banner')) {
                $image = $app_banner->image;
                $path = 'upload/images/banners/'.$image;
                unlink($path);
                $images = $request->banner;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(1920, 452)->save(public_path('/upload/images/banners/' . $filename));
                    $app_banner->image = $filename;
                }
            }
            $app_banner->save();
        }

        return back();
    }

}

