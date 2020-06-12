<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutUsController extends Controller
{
    public function welcomearea(Request $request)
    {
        $app_about_id = AboutUs::where('name', 'Welcome Area')->get('id');
        $app_about_id = json_decode(json_encode($app_about_id), true);
        if ($app_about_id != null) {
            $app_about_id = $app_about_id[0]['id'];
        }
        if ($app_about_id == null) {
            $welcome_about = new AboutUs();
            $welcome_about->name = 'Welcome Area';
            $welcome_about->title = $request->title;
            $welcome_about->description = $request->description;
            $welcome_about->save();
        }else{
            $welcome_about = AboutUs::find($app_about_id);
            $welcome_about->name = 'Welcome Area';
            $welcome_about->title = $request->title;
            $welcome_about->description = $request->description;
            $welcome_about->save();
        }
        return back();
    }

    public function foodarea(Request $request)
    {
        $app_about_id = AboutUs::where('name', 'Food Area')->get('id');
        $app_about_id = json_decode(json_encode($app_about_id), true);
        if ($app_about_id != null) {
            $app_about_id = $app_about_id[0]['id'];
        }
        if ($app_about_id == null) {
            $food_about = new AboutUs();
            $food_about->name = 'Food Area';
            $food_about->title = $request->title;
            $food_about->description = $request->description;
            $food_about->save();
        }else{
            $food_about = AboutUs::find($app_about_id);
            $food_about->name = 'Food Area';
            $food_about->title = $request->title;
            $food_about->description = $request->description;
            $food_about->save();
        }
        return back();
    }

    public function deshesarea(Request $request)
    {
        $app_about_id = AboutUs::where('name', 'Deshes Area')->get('id');
        $app_about_id = json_decode(json_encode($app_about_id), true);
        if ($app_about_id != null) {
            $app_about_id = $app_about_id[0]['id'];
        }
        if ($app_about_id == null) {
            $deshes_about = new AboutUs();
            $deshes_about->name = 'Deshes Area';
            $deshes_about->title = $request->title;
            $deshes_about->description = $request->description;
            $deshes_about->save();
        }else{
            $deshes_about = AboutUs::find($app_about_id);
            $deshes_about->name = 'Deshes Area';
            $deshes_about->title = $request->title;
            $deshes_about->description = $request->description;
            $deshes_about->save();
        }
        return back();
    }

    public function footerarea(Request $request)
    {
        $app_about_id = AboutUs::where('name', 'Footer Area')->get('id');
        $app_about_id = json_decode(json_encode($app_about_id), true);
        if ($app_about_id != null) {
            $app_about_id = $app_about_id[0]['id'];
        }
        if ($app_about_id == null) {
            $footer_about = new AboutUs();
            $footer_about->name = 'Footer Area';
            if ($request->hasFile('footer_logo')){
                $images = $request->footer_logo;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(182, 53)->save(public_path('/upload/images/logos/' . $filename));
                    $footer_about->image = $filename;
                }
            }
            $footer_about->description = $request->description;
            $footer_about->save();
        }else{
            $footer_about = AboutUs::find($app_about_id);
            $footer_about->name = 'Footer Area';
            if ($request->hasFile('footer_logo')){
                $image = $footer_about->image;
                $path = 'upload/images/logos/'.$image;
                unlink($path);
                $images = $request->footer_logo;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 5) . '.DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                    Image::make($image->getRealPath())->resize(182, 53)->save(public_path('/upload/images/logos/' . $filename));
                    $footer_about->image = $filename;
                }
            }
            $footer_about->description = $request->description;
            $footer_about->save();
        }
        return back();
    }
}
