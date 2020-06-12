<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Thana;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $districts = District::all();
        $thanas = Thana::all();
        return view('admin.delivery-area',compact('countries','districts','thanas'));
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
    public function countrystore(Request $request)
    {
        $country = new Country();
        $country->name = $request->country_name;
        $country->save();
        return back()->withMessage('Country Added Successfully');
    }

    public function districtstore(Request $request)
    {
        $district = new District();
        $district->name = $request->district_name;
        $district->save();
        return back()->withMessage('District Added Successfully');
    }

    public function thanastore(Request $request)
    {
        $thana = new Thana();
        $thana->name = $request->thana_name;
        $thana->save();
        return back()->withMessage('Thana Added Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function countrydestroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return back()->withMessage('Country Deleted Successfully');
    }

    public function districtdestroy($id)
    {
        $district = District::find($id);
        $district->delete();
        return back()->withMessage('District Deleted Successfully');
    }

    public function thanadestroy($id)
    {
        $thana = Thana::find($id);
        $thana->delete();
        return back()->withMessage('Thana Deleted Successfully');
    }


    public function countrybulkdestroy(Request $request)
    {
        $ids = $request->id;
        foreach ($ids as $id) {
            $country = Country::find($id);
            $country->delete();
        }
        return back()->withMessage('Countries Deleted Successfully');

    }

    public function districtbulkdestroy(Request $request)
    {
        $ids = $request->id;
        foreach ($ids as $id) {
            $district = District::find($id);
            $district->delete();
        }
        return back()->withMessage('Districts Deleted Successfully');

    }

    public function thanabulkdestroy(Request $request)
    {
        $ids = $request->id;
        foreach ($ids as $id) {
            $thana = Thana::find($id);
            $thana->delete();
        }
        return back()->withMessage('Thanas Deleted Successfully');

    }
}
