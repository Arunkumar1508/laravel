<?php

namespace App\Http\Controllers;

use App\Amazon_add_to_cart;
use App\amazon_buys;
use App\model\category;
use App\model\product;
use Illuminate\Http\Request;

class AddtocartController extends Controller
{
    public function addtocart(Request $request)
    {
        session(['login'=>$request->path()]);

        $id = request()->id;
        $usersid = request()->usersid;
        $count = request()->count;
        // dd($id, $usersid);

        $update = Amazon_add_to_cart::where([["product_id", "=", $id], ["user_id", "=", $usersid]])->exists();

        if ($update) {
            Amazon_add_to_cart::where("product_id", "=", $id)->increment('product_quantity', 1);


        } else {
            Amazon_add_to_cart::create([
                "user_id" => $usersid,
                "product_id" => $id,
                "product_quantity" => $count
            ]);



        }
    }

    public function addtocart_view(Request $request)
    {

        session(['login'=>$request->path()]);

        $nav = category::all();
        $auth = auth()->user();

        $total = Amazon_add_to_cart::leftjoin('amazon_products', 'amazon_products.id', '=', 'amazon_add_to_carts.product_id')
            ->where('amazon_add_to_carts.user_id', '=', $auth->id)
            ->get();


        $sum = 0;

        foreach ($total as $subtotal) {
            $sum = $subtotal->product_price * $subtotal->product_quantity + $sum;
        }


        $daw = product::join('amazon_add_to_carts', 'amazon_products.id', '=', 'amazon_add_to_carts.product_id')->get();



        $counts = count($daw);



        return view('amazon.addtocart_view', [
            'category' => $nav,
            'daws' => $daw,
            'counts' => $counts,
            'authuser' => $auth,
            'sum'=>$sum

        ]);




    }


    public function buy(Request $request){
        session(['login'=>$request->path()]);

        $nav = category::all();
        $auth = auth()->user();


        if($auth){

            $total = Amazon_add_to_cart::leftjoin('amazon_products', 'amazon_products.id', '=', 'amazon_add_to_carts.product_id')
            ->where('amazon_add_to_carts.user_id', '=', $auth->id)
            ->get();
            $sum = 0;

        foreach ($total as $subtotal) {
            $sum = $subtotal->product_price * $subtotal->product_quantity + $sum;
        }
        $rr=$request->catid;
        $daw11=product::find($rr);


            $daw = product::join('amazon_add_to_carts', 'amazon_products.id', '=', 'amazon_add_to_carts.product_id')->get();
            $counts = count($daw);

            return view('amazon.buy',[
                'category' => $nav,
                'authuser' => $auth,
                'daws' => $daw,
                'counts' => $counts,
                'sum'=>$sum,
                'daw11'=> $daw11


            ]);
        }
        else{
            return redirect('/register');
            // <a href="{{ route('register') }}">Register</a>

        }


    }


    // addto cart remove


    public function remove(Request $request)
    {

        session(['login'=>$request->path()]);
        // $id = request()->id;

        // Amazon_add_to_cart::where([["product_id", "=",$request->id],['user_id', "=", auth()->user()->id]])->delete();
        Amazon_add_to_cart::where("product_id",$request->id)->delete();



    }


    public function finalupdated(Request $request){
        session(['login'=>$request->path()]);
//    dd( $request->product_id);
        $request->validate([

            "address" => ["required"],

            "payment" => ["required"],

        ]);
        // dd($dd);


        $savedc = new amazon_buys();
        $savedc->user_id = auth()->user()->id;
        $savedc->product_id = $request->product_id;
        $savedc->address = $request->address;
        $savedc->payment_method = $request->payment;
        $savedc->purchase_price = $request->purchaseprice;
        $savedc->save();

        return redirect()->route('success');


    }

    // public function add(){
    //     $product_id=request()->quan;
    //     $user=auth()->user()->id;

    //     $qq=Amazon_add_to_cart::where([["product_id","=","$product_id"],["$user"]]);


    // }


    public function success(Request $request){
        session(['login'=>$request->path()]);
        $nav = category::all();
        $auth = auth()->user();

        return view('amazon.success',[
            'category' => $nav,
            'authuser' => $auth,
        ]);
    }



    // public function datas(){
    //    $vv=product::all();

    // // dd($vv);
    //     return response()->json($vv,200);

    // }
}
