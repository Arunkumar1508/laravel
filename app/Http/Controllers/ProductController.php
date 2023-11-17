<?php

namespace App\Http\Controllers;

use App\Amazon_trending;
use App\Jobs\Trendingsale;
use App\model\category;
use App\model\product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function show(Request $request)

    {
        session(['login'=>$request->path()]);

        $auth = auth()->user();

        if (auth()->user()->isadmin == 0) {
            // return "user";
            $categories_product = category::all();
            return view('layouts.amazonindex', [

                'category' => $categories_product,
                'authuser' => $auth
            ]);

        } else if (auth()->user()->isadmin == 1) {
            $nav = category::all();

            return view("amazon.admin", [

                'category' => $nav,
            ]);


        }










    }

    public function add(Request $request)
    {
        session(['login'=>$request->path()]);

        $nav = category::all();
        // $auth=auth()->user();


        return view('amazon.admin', [
            'category' => $nav,
            // 'authuser'=>$auth


        ]);


    }

    public function productshow(Request $request)
    {
        session(['login'=>$request->path()]);

        Trendingsale::dispatch();

        $auth = auth()->user();
        $nav = category::all();

        $trend=Amazon_trending::join('amazon_products','amazon_products.id','=','amazon_trendings.product_id')->get();

        // if (auth()->user()->isadmin == 0) {


            $categories_product = category::all();

            return view('amazon.welcomeproduct', [
                'category' => $nav,
                'category1' => $categories_product,
                'authuser' => $auth,
                'trend'=>$trend

            ]);
        // } else if (auth()->user()->isadmin == 1) {
            // $nav = category::all();

            // return view("amazon.admin", [

                // 'category' => $nav,
            // ]);
        // }
    }

    public function search(Request $request)
    {
        session(['login'=>$request->path()]);

        $auth = auth()->user();

        $nav = category::all();

        $search = $request->search;
        $search_category = $request->categoryid;
        // dd($search_category);

        if ($search_category) {
            $result = product::where('categories_id', '=', $search_category)->get();
            // dd($result);
            return view('amazon.search', [
                'category' => $nav,
                "view" => $result,
                'authuser' => $auth

            ]);

        } else {
            $auth = auth()->user();

            $result = DB::table('amazon_products')
                ->where('product_name', '=', $search)->get();



            return view('amazon.search', [
                'category' => $nav,
                "view" => $result,
                'authuser' => $auth



            ]);
        }

    }

    public function move($id,Request $request)
    {
        session(['login'=>$request->path()]);

        $auth = auth()->user();

        //     dd ( url ($varr[0]->product_image));
        //     $varr=product::get();
        // foreach($varr as $values){
        // echo(url ($values->product_image))."<br>";


        $nav = category::all();

        $results1 = product::where('id', '=', $id)->get();
        // dd($results1);

        return view('amazon.selectproduct', [
            'category' => $nav,
            "moves" => $results1,
            'authuser' => $auth


            // dd($results1);



        ]);
    }





    public function update(Request $request)
    {
        session(['login'=>$request->path()]);

            $auth = auth()->user();


            $attributes = $request->validate([
                "product_name" => ["required"],
                "product_price" => ["required"],
                "product_description" => ["required"],
                "product_quantity" => ["required"],
                "product_image" => ["required"],
                "admin" => ["required"],
                "categories_id" => ["required"],



            ]);
            // dd( $attributes);
            if (request('product_image')) {

                $image_decrpt = time() . '.' . $request->product_image->extension();

                $request->product_image->move(public_path('css/img/amazondbimage'), $image_decrpt);
            }

            product::where('id', $request->id)->update([
                "product_name" =>$request->product_name,
                "product_price" => $request->product_price,
                "product_description" => $request->product_description,
                "product_quantity" => $request->product_quantity,
                "product_image" => $image_decrpt,
                "admin" => $request->admin,
                "categories_id" => $request->categories_id,

            ]);

            return back();





    }

    public function updated(Request $request)
    {
        session(['login'=>$request->path()]);
        //   dd($request);
        $attach = $request->validate([
            "category_name" => ["required"],
            "category_title" => ["required"],
            "category_quantity" => ["required"],
        ]);

        category::create($attach);
        return back();
    }



}
