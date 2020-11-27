<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // getAll product data
    public function index(Request $request){
        $name = $request->session()->get('name');
        $input = $request->search;
        if($input != null){
            $product = Product::where('product_name','like',"%".$request->input('search')."%")->first('id_product');
            $category = Category::where('category_name','like',"%".$request->input('search')."%")->first('id_category');
            if($product != null){
                $products = Product::where('product_name','like',"%".$request->input('search')."%")->paginate(3);
            }
            if ($category != null){
                $id = Category::all()->find($category)->getAttribute('id_category');
                $products = Product::where('id_category', $id)->paginate(3);
            }
            $products->appends(['search' =>$request->input('search')]);
            return view('guest', ['products'=>$products])->with('user', $name);
        }else{
            $products = Product::paginate(3);
            return view('guest', ['products'=>$products])->with('user', $name);
        }
    }
    // return view page
    public function insertPage(){
        $category = Category::all();
        return view('insert',['category'=>$category]);
    }
    public function updatePage($id){
        $update = Product::find($id);
        $category = Category::all();
        return view('updatefigure', ['category'=>$category])->with('update', $update);
    }
    public function detail($id){
        $detail = Product::find($id);

        return view('detail')->with('detail', $detail);
    }        
    // insert NEW product data to database
    public function insert(Request $request){
        $rules = array(
            'figurename' => 'required|min:5|regex:/^.*(?=.*[a-zA-Z]).*$/',
            'price' => 'required|numeric|min:100000',
            'quantity' => 'required|numeric|min:1',
            'description' => 'required|min:10',
            'category' => 'required',
            'figurepic' => 'required|image|mimes:jpeg,png,jpg',
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $path = $request->figurepic->storeAs('', $request->figurepic->getClientOriginalName());

            $product = new Product();
            $product->product_name = $request->input('figurename');
            $product->product_desc = $request->input('description');
            $product->id_category = $request->input('category');
            $product->product_price = $request->input('price');
            $product->product_quantity = $request->input('quantity');
            $product->product_image = $path;

            $product->save();
        }
        return redirect()->action('ProductController@viewManageFigure');
    }

    public function update(Request $request){
        $rules = array(
            'figurename' => 'required|min:5|regex:/^.*(?=.*[a-zA-Z]).*$/',
            'price' => 'required|numeric|min:100000',
            'quantity' => 'required|numeric|min:1',
            'description' => 'required|min:10',
            'category' => 'required',
            'figurepic' => 'required|image|mimes:jpeg,png,jpg',
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $path = $request->figurepic->storeAs('', $request->figurepic->getClientOriginalName());
            $figure = DB::table('products')->where('id_product', $request->input('updateBtn'))
                ->update(['product_name'
                => $request->input('figurename')]);
            $figure = DB::table('products')->where('id_product', $request->input('updateBtn'))
                ->update(['id_category'
                => $request->input('category')]);
            $figure = DB::table('products')->where('id_product', $request->input('updateBtn'))
                ->update(['product_desc'
                => $request->input('description')]);
            $figure = DB::table('products')->where('id_product', $request->input('updateBtn'))
                ->update(['product_quantity'
                => $request->input('quantity')]);
            $figure = DB::table('products')->where('id_product', $request->input('updateBtn'))
                ->update(['product_price'
                => $request->input('price')]);
            $figure = DB::table('products')->where('id_product', $request->input('updateBtn'))
                ->update(['product_image'
                => $path]);
        }

        return redirect()->action('ProductController@viewManageFigure');
    }
    public function deletefigure($id){
    	// delete data
        Product::where('id_product',$id)->delete();

        return redirect()->back();
    }

    public function viewManageFigure(){
        $products = Product::paginate(6);

        return view('managefigure', ['products' => $products]);
    }
}
