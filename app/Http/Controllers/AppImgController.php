<?php

namespace App\Http\Controllers;

use App\AppImg;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AppImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logostore(Request $request)
    {
        $this->validate($request,[
            'logo'=>'required|max:1'
        ]);
        $app_image_id = AppImg::where('name','LOGO')->get('id');
        $app_image_id = json_decode(json_encode($app_image_id),true);
        if ($app_image_id != null) {
            $app_image_id = $app_image_id[0]['id'];
        }
//        dd($app_image_id);
        if($app_image_id != null) {
            $app_logo = AppImg::find($app_image_id);
            $image = $app_logo->image;
            $path = 'upload/images/logos/'.$image;
            unlink($path);
            $app_image = $app_logo;
            $app_image->name = 'Logo';
            if ($request->hasFile('logo')) {
                $images = $request->logo;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(159, 49)->save(public_path('/upload/images/logos/' . $filename));
                    $app_image->image = $filename;
                }
            }
        }else{
            $app_image = new AppImg();
            $app_image->name = 'Logo';
            if ($request->hasFile('logo')) {
                $images = $request->logo;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(159, 49)->save(public_path('/upload/images/logos/' . $filename));
                    $app_image->image = $filename;
                }
            }
        }
        $app_image->save();

        return back();
    }

    public function welcomeAreaImgstore(Request $request)
    {
        $this->validate($request,[
            'welcomeAreaImg'=>'required|max:1'
        ]);
        $app_image_id = AppImg::where('name','Welcome')->get('id');
        $app_image_id = json_decode(json_encode($app_image_id),true);
        if ($app_image_id != null) {
            $app_image_id = $app_image_id[0]['id'];
        }
//        dd($app_image_id);
        if($app_image_id != null) {
            $app_welcome_img = AppImg::find($app_image_id);
            $image = $app_welcome_img->image;
            $path = 'upload/images/banners/'.$image;
            unlink($path);
            $app_image = $app_welcome_img;
            $app_image->name = 'Welcome';
            if ($request->hasFile('welcomeAreaImg')) {
                $images = $request->welcomeAreaImg;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(741, 741)->save(public_path('/upload/images/banners/' . $filename));
                    $app_image->image = $filename;
                }
            }
        }else{
            $app_image = new AppImg();
            $app_image->name = 'Welcome';
            if ($request->hasFile('welcomeAreaImg')) {
                $images = $request->welcomeAreaImg;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(741, 741)->save(public_path('/upload/images/banners/' . $filename));
                    $app_image->image = $filename;
                }
            }
        }
        $app_image->save();

        return back();
    }

    public function menubannerstore(Request $request)
    {
        $this->validate($request,[
            'menu_banner'=>'required|max:1'
        ]);
        $app_image_id = AppImg::where('name','Menu Banner')->get('id');
        $app_image_id = json_decode(json_encode($app_image_id),true);
        if ($app_image_id != null) {
            $app_image_id = $app_image_id[0]['id'];
        }
        if($app_image_id != null) {
            $app_welcome_img = AppImg::find($app_image_id);
            $image = $app_welcome_img->image;
            $path = 'upload/images/banners/'.$image;
            unlink($path);
            $app_image = $app_welcome_img;
            $app_image->name = 'Menu Banner';
            if ($request->hasFile('menu_banner')) {
                $images = $request->menu_banner;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(1920, 481)->save(public_path('/upload/images/banners/' . $filename));
                    $app_image->image = $filename;
                }
            }
        }else{
            $app_image = new AppImg();
            $app_image->name = 'Menu Banner';
            if ($request->hasFile('menu_banner')) {
                $images = $request->menu_banner;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(1920, 481)->save(public_path('/upload/images/banners/' . $filename));
                    $app_image->image = $filename;
                }
            }
        }
        $app_image->save();

        return back();
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppImg  $appImg
     * @return \Illuminate\Http\Response
     */
    public function show(AppImg $appImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppImg  $appImg
     * @return \Illuminate\Http\Response
     */
    public function edit(AppImg $appImg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppImg  $appImg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppImg $appImg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppImg  $appImg
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppImg $appImg)
    {
        //
    }
}
