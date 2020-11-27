<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all();

        return view('/managecategory', compact('category'));
    }
    // insert
    public function insertpage(){
        return view('insertcategory');
    }
    public function insert(Request $request){
        $rules = array(
            'category' => 'required|min:5'
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $category = new Category();
            $category->category_name = $request->input('category');

            $category->save();
        }

        return redirect()->action('CategoryController@index');
        // return redirect()->back();
    }

    public function updatepage($id){
        $category = Category::find($id);

        return view('updatecategory',['category'=>$category]);
    }
    public function update(Request $request){
        $rules = array(
            'category' => 'required|min:5'
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $category = DB::table('category')->where('id_category', $request->input('updateBtn'))
                ->update(['category_name'
                => $request->input('category')]);
        }
        return redirect()->action('CategoryController@index');
    }
    public function deleteCategory($id){
        Category::where('id_category',$id)->delete();

        return redirect()->back();
    }
}
