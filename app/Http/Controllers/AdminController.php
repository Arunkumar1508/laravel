<?php

namespace App\Http\Controllers;

use App\Amazon_add_to_cart;
use App\model\product;

use Illuminate\Http\Request;
use App\model\category;
use DB;

class AdminController extends Controller
{
    public function update()
    {
        $url_link="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        session(['url'=>$url_link]);

        $auth = auth()->user();


        $nav = category::all();
        return view('amazon.admin', [

            'category' => $nav,
            'authuser' => $auth


        ]);

    }

    public function store(Request $request)
    {
        session(['login'=>$request->path()]);


        $request->validate([
            "product_name" => ["required"],
            "product_price" => ["required"],
            "product_description" => ["required"],
            "product_quantity" => ["required"],
            "product_image" => ["required"],
            "product_approve" => ["required"],
            "category_id" => ["required"],

        ]);
        $image_decrpt = time() . '.' . $request->product_image->extension();

        // dd($image_decrpt);

        $request->product_image->move(public_path('css/img/amazondbimage'), $image_decrpt);

        // dd('success');


        $save = new product();
        $save->categories_id = $request->category_id;
        $save->product_name = $request->product_name;
        $save->product_price = $request->product_price;
        $save->product_description = $request->product_description;
        $save->product_quantity = $request->product_quantity;
        $save->product_image = $image_decrpt;
        $save->admin = $request->product_approve;
        $save->save();

        // dd($save);



        return back();

    }

    public function adminlist(Request $request)
    {
        session(['login'=>$request->path()]);

        $auth = auth()->user();


        // return "hii";
        $nav = category::all();


        $productviews = product::paginate(4);
        //   dd($productviews);

        return view('amazon.adminviewproduct', [
            'category' => $nav,
            'adminlist' => $productviews,
            'authuser' => $auth



        ]);


    }

    public function edit($id,Request $request)
    {
        session(['login'=>$request->path()]);
        $auth = auth()->user();

        $nav = category::all();


        $productviews = product::find($id);

        // dd($productviews->toArray());
        return view('amazon.adminedit', [
            'category' => $nav,
            'adminlist' => $productviews,
            'authuser' => $auth
        ]);
    }

    public function delete($id)
    {
        $deteles = product::find($id);

        $deteles->delete();
    }

    // public function remove($id)
    // {
        // $id = request()->id;
        // Amazon_add_to_cart::where(["product_id", "=", $id],['user_id', "=", auth()->user()->id])->delete();

        // $return = product::where(["product_id", "=", $id],['user_id', "=", auth()->user()->id])->get();

        // return response()->json($return, "200");

    // }

    public function approve($id)
    {
        $url_link="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        session(['url'=>$url_link]);
        // dd($id);
        $addmins = product::find($id);
        // dd($addmins);
        if ($addmins->admin == 0) {
            product::where("id", "=", $id)->update(['admin' => 1]);
            $plucks = product::where("id", "=", $id)->get();
            $response = $plucks[0]->admin;
            return response()->json($response, '200');

        } else {

            product::where("id", "=", $id)->update(['admin' => 0]);
            $plucks = product::where("id", "=", $id)->get();
            $response = $plucks[0]->admin;
            return response()->json($response, '200');

        }
        // return response()->json($admin,"200");
    }



    public function categories_list()
    {
        $nav = product::all();

        return view('amazon.admincategories', [
            'category' => $nav,

        ]);
    }

    public function categories_view()
    {

        $auth = auth()->user();
        $nav = product::all();

        $productsviews = category::all();

        return view('amazon.admincategories_view', [

            'category' => $nav,
            'authuser' => $auth,
            'lbw' => $productsviews

        ]);

    }

    public function adminsearch(Request $request)
    {



        $nav = category::all();

        $search = $request->search;
        $search_category = $request->categoryid;
        // dd($search_category);

        if ($search_category) {
            $result = product::where('categories_id', '=', $search_category)->paginate(4);
            // dd($result);
            return view('amazon.adminviewproduct', [
                'category' => $nav,
                "view" => $result,
                'adminlist' => $result,



            ]);

        } else {


            $result = DB::table('amazon_products')
                ->where('product_name', '=', $search)->paginate(4);



            return view('amazon.adminviewproduct', [
                'category' => $nav,
                "view" => $result,
                'adminlist' => $result,





            ]);
        }

    }
}
