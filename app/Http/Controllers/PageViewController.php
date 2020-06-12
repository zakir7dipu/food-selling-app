<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\AppImg;
use App\Banner;
use App\ContactUs;
use App\Product;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = AppImg::where('name','LOGO')->get('image');
        $logo = json_decode(json_encode($logo),true);
        if ($logo != null) {
            $logo = $logo[0]['image'];
        }else{
            $logo = '';
        }
        $welcome_area_image = AppImg::where('name','Welcome')->get('image');
        $welcome_area_image = json_decode(json_encode($welcome_area_image),true);
        if ($welcome_area_image != null) {
            $welcome_area_image = $welcome_area_image[0]['image'];
        }else{
            $welcome_area_image = '';
        }
        $banner_id = Banner::where('name','Bannar Main')->get('id');
        $banner_first = Banner::find($banner_id);
        $banner_id2 = Banner::where('name','Bannar Second')->get('id');
        $banner_second = Banner::find($banner_id2);
        $about_id = AboutUs::where('name','Welcome Area')->get('id');
        $welcome_about = AboutUs::find($about_id);
        $about_id = AboutUs::where('name','Food Area')->get('id');
        $food_about = AboutUs::find($about_id);
        $about_id = AboutUs::where('name','Deshes Area')->get('id');
        $deshes_about = AboutUs::find($about_id);
        $about_id = AboutUs::where('name','Footer Area')->get('id');
        $footer_about = AboutUs::find($about_id);
        $app_contact = ContactUs::all();
        $products = Product::orderBy('created_at','desc')->get()->take(6);
        return view('client.home',compact('logo','welcome_area_image','banner_first','banner_second','welcome_about','food_about','deshes_about','footer_about','app_contact','products'));
    }

    public function ajaxbannarimgget()
    {
        $banner_id1 = Banner::where('name','Bannar Main')->get('id');
        $banner1 =  Banner::find($banner_id1);
        $banner_id2 = Banner::where('name','Bannar Second')->get('id');
        $banner2 =  Banner::find($banner_id2);
        return response()->json(['data'=>[$banner1,$banner2]]);
    }

    public function ajaxwelcomeareaget()
    {
        $about_id = AboutUs::where('name','Welcome Area')->get('id');
        $welcome_about = AboutUs::find($about_id);
        $about_id = AboutUs::where('name','Food Area')->get('id');
        $food_about = AboutUs::find($about_id);
        $about_id = AboutUs::where('name','Deshes Area')->get('id');
        $deshes_about = AboutUs::find($about_id);
        $about_id = AboutUs::where('name','Footer Area')->get('id');
        $footer_about = AboutUs::find($about_id);
        return response()->json(['data'=>[$welcome_about,$food_about,$deshes_about,$footer_about]]);

    }

    public function ajaxcontactget()
    {
        $app_contact_id = 1;
        $app_contact = ContactUs::find($app_contact_id);
        return response()->json(['data'=>[$app_contact]]);

    }

    public function ajaxquickview(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json(['data'=>[$product]]);

    }

    public function ajaxmenubannarimgget()
    {
        $app_image_id = AppImg::where('name','Menu Banner')->get('id');
        $app_image_id = json_decode(json_encode($app_image_id),true);
        if ($app_image_id != null) {
            $app_image_id = $app_image_id[0]['id'];
        }
        $menu_banner = AppImg::find($app_image_id);
        return response()->json(['data'=>[$menu_banner]]);
    }

    public function productmenu()
    {
        $logo = AppImg::where('name','LOGO')->get('image');
        $logo = json_decode(json_encode($logo),true);
        if ($logo != null) {
            $logo = $logo[0]['image'];
        }else{
            $logo = '';
        }
        $about_id = AboutUs::where('name','Footer Area')->get('id');
        $footer_about = AboutUs::find($about_id);
        $app_contact = ContactUs::all();
        $products = Product::orderBy('created_at','desc')->paginate(3);
        return view('client.product-menu',compact('logo','footer_about','app_contact','products'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
