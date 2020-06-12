<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\AppImg;
use App\ContactUs;
use App\Country;
use App\District;
use App\OrderProduct;
use App\Product;
use App\Thana;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function prosid(Request $request)
    {
        $product_id = Product::where('sku',$request->sku)->get('id');
        $product = Product::find($product_id);
        foreach ($product as $item){
            $order_name = $item->name;
            $order_image = $item->image;
            $order_sku = $item->sku;
            $order_price = $item->price;
        }
        $order_qty = $request->qty;
        $x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $x = str_shuffle($x);
        $x = substr($x,0,10);
        $order_nubber = "#".time().$x;

        $item_array = array(
            "name" => $order_name,
            "image" => $order_image,
            "sku" => $order_sku,
            "price" => $order_price,
            "qty" => $order_qty,
            "no" => $order_nubber,
        );
        $list_data[] = $item_array;
        $order = json_encode($list_data);
        setcookie("order", $order, time()+(60*60));
    }

    public function process()
    {
        if (isset($_COOKIE["order"])) {
            $order = stripslashes($_COOKIE["order"]);
            $order = json_decode($order, true);
//            dd($order);
            foreach ($order as $item){
                $product_name = $order[0]['name'];
                $product_image = $order[0]['image'];
                $product_sku = $order[0]['sku'];
                $product_price = $order[0]['price'];
                $product_qty = $order[0]['qty'];
                $order_no = $order[0]['no'];
                $product_total = $product_price * $product_qty.".00";
            }
        }else{
            $product_name = "Not Select Any Product";
            $product_image = "";
            $product_sku = "";
            $product_price = 0.00;
            $product_qty = 0;
            $order_no = "";
            $product_total = 0.00;
        }
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
        $countries = Country::all();
        $districts = District::all();
        $thanas = Thana::all();
        return view('client.order-process',compact('logo','footer_about','app_contact','product_sku','product_name','product_image','product_price','order_no','product_qty','product_total','countries','districts','thanas'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required',
           'phone'=>'required',
           'country'=>'required',
           'district'=>'required',
           'thana'=>'required',
           'home'=>'required',
           'product_name'=>'required',
           'product_image'=>'required',
           'product_sku'=>'required',
           'order_number'=>'required',
           'order_amount'=>'required',
           'order_qty'=>'required',
        ]);
        $order = new OrderProduct();
        $order->order_no = $request->order_number;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->country = $request->country;
        $order->district = $request->district;
        $order->thana = $request->thana;
        $order->home = $request->home;
        $order->product_name = $request->product_name;
        $order->product_image = $request->product_image;
        $order->product_sku = $request->product_sku;
        $order->order_qty = $request->order_qty;
        $order->order_amount = $request->order_amount;
        $order->save();
        $order_cookie = "";
        setcookie("order",$order_cookie, time()+(5));
        return back()->withMessage('Order Placed Successfully');
    }

    public function update(Request $request, $id)
    {
        if ($request->approval != 3) {
            $order = OrderProduct::find($id);
            if ($order->approval != 1) {
                $order->approval = $request->approval;
                $order->save();
            } else {
                $order->approval = $request->approval;
                $order->save();
                $product_sku = $order->product_sku;
                $order_qty = $order->order_qty;
                $product_id = Product::where('sku', $product_sku)->get('id');
                $product_id = json_decode(json_encode($product_id), true);
                if ($product_id != null) {
                    $product_id = $product_id[0]['id'];
                }
//            dd($product_id);
                $product = Product::find($product_id);
                $stock = $product->stock;
                $stock = $stock + $order_qty;
//            dd($stock);
                $product->stock = $stock;
                $product->save();
            }
            if ($request->approval == 1) {
                $product_sku = $order->product_sku;
                $order_qty = $order->order_qty;
                $product_id = Product::where('sku', $product_sku)->get('id');
                $product_id = json_decode(json_encode($product_id), true);
                if ($product_id != null) {
                    $product_id = $product_id[0]['id'];
                }
//            dd($product_id);
                $product = Product::find($product_id);
                $stock = $product->stock;
                $stock = $stock - $order_qty;
//            dd($stock);
                $product->stock = $stock;
                $product->save();
            }
            return back()->withMessage('Your Product Order Is Updated');
        }else{
            $order = OrderProduct::find($id);
            $order->delete();
            return back()->withMessage('Your Product Order Is Deleted');
        }
    }
}
