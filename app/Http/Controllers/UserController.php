<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function signinpage(){
        return view('signin');
    }
    public function registerpage(){
        return view('register');
    }
    public function updateProfile(Request $request){
        $name = $request->session()->get('name');
        $id = Users::where('fullname', $name)->first(['id_user']);
        $id2 = Users::all()->find($id)->getAttribute('id_user');
        $rules = array(
            'fullname' => 'required|min:5|regex:/^.*(?=.*[a-zA-Z]).*$/',
            'userEmail' => 'required|email|unique:users,email,'.$id2.',id_user',
            'userAddress' => 'required|min:10',
            'userPhone' => 'required|numeric|min:11',
            'userGender' => 'required',
            'userPic' => 'required|image|mimes:jpeg,png,jpg'
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $path = $request->userPic->storeAs('', $request->userPic->getClientOriginalName());
            $user = DB::table('users')->where('id_user', $id2)
                ->update(['fullname'
                => $request->input('fullname')]);
            $user = DB::table('users')->where('id_user', $id2)
                ->update(['email'
                => $request->input('userEmail')]);
            $user = DB::table('users')->where('id_user', $id2)
                ->update(['address'
                => $request->input('userAddress')]);
            $user = DB::table('users')->where('id_user', $id2)
                ->update(['phone'
                => $request->input('userPhone')]);
            $user = DB::table('users')->where('id_user', $id2)
                ->update(['gender'
                => $request->input('userGender')]);
            $user = DB::table('users')->where('id_user', $id2)
                ->update(['profile_picture'
                => $path]);
        }
        $name = Users::all()->find($id2)->getAttribute('fullname');
        $request->session()->put('name', $name);

        return redirect()->action('UserController@profile');
    }

    public function profile(Request $request){
        $name = $request->session()->get('name');
        $id = Users::where('fullname', $name)->first(['id_user']);
        $id2 = Users::all()->find($id)->getAttribute('id_user');
        $profile  = Users::find($id2);
        return view('updateprofile')->with('profile', $profile);
    }

    public function register(Request $request){
        $rules = array(
            'fullname' => 'required|min:5|regex:/^.*(?=.*[a-zA-Z]).*$/',
            'userEmail' => 'required|email|unique:users,email',
            'userPassword' => 'required|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|min:5',
            'userConfirmPassword' => 'same:userPassword',
            'userPhone' => 'required|numeric|min:11',
            'userAddress' => 'required|min:10',
            'userGender' => 'required|',
            'userPic' => 'required|image|mimes:jpeg,png,jpg',
            'termandcondition' => 'accepted'
        );


        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            // register
            $path = $request->userPic->storeAs('', $request->userPic->getClientOriginalName());

            $user = new User();

            $user->fullname = $request->input('fullname');
            $user->email = $request->input('userEmail');
            $user->password = bcrypt($request->input('userPassword'));
            $user->phone = $request->input('userPhone');
            $user->gender = $request->input('userGender');
            $user->address = $request->input('userAddress');
            $user->profile_picture = $path;
            $user->role = 'User';

            $user->save();
        }
    	return redirect()->to('/signin');
    }
    public function signin(Request $request){
    	// signin
        $email = $request->input('userEmail');
        $pass = $request->input('userPassword');
        $rules = array(
            'userEmail' => 'required|exists:users,email',
            'userPassword' => 'required'
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()){
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else if(Auth::attempt([
            'email' => $email,
            'password' => $pass 
        ])){
            $this->buatSession($request, $email);
            return redirect()->to('/home')->with(['email',$email], ['role', $request->session()->get('role')]);
        }else{
            return redirect()->back();
        }

		// return view('master');
    }

    public function signout(Request $request){
    	// user logout
        Auth::logout();
        $this->hapusSession($request);

    	return redirect()->action('ProductController@index');
    }

    public function viewManageUser(){
        $user = Users::all();

        return view('/manageuser', ['user' => $user]);
    }

    public function tampilkanSession(Request $request) {
        if($request->session() !=null){
            echo $request->session()->get('role');
            echo $request->session()->get('name');
        }else{
            echo 'Tidak ada data dalam session.';
        }
    }

    // membuat session
    public function buatSession(Request $request, $email) {
        $id = Users::where('email', $email)->first(['id_user']);
        $role = Users::all()->find($id)->getAttribute('role');
        $name = Users::all()->find($id)->getAttribute('fullname');
        $request->session()->put('role', $role);
        $request->session()->put('name', $name);
    }

    // menghapus session
    public function hapusSession(Request $request) {
        $request->session()->flush();
    }

    public function deleteuser($id){
    	// delete data
        Users::where('id_user',$id)->delete();

        return redirect()->back();
    }

    public function insertadminpage(){
        return view('insertuser');
    }
    public function updateManageUserView($id){
        $profile  = Users::find($id);

        return view('updatemanageuser')->with('profile', $profile);
    }

    public function updateManageUser(Request $request){
        $id = $request->input('submitBtn');
        $rules = array(
            'fullname' => 'required|min:5|regex:/^.*(?=.*[a-zA-Z]).*$/',
            'userEmail' => 'required|email|unique:users,email,'.$id.',id_user',
            'userAddress' => 'required|min:10',
            'userPhone' => 'required|numeric|min:11',
            'userGender' => 'required',
            'userPic' => 'required|image|mimes:jpeg,png,jpg',
        );

        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $path = $request->userPic->storeAs('', $request->userPic->getClientOriginalName());
            $user = DB::table('users')->where('id_user', $id)
                ->update(['fullname'
                => $request->input('fullname')]);
            $user = DB::table('users')->where('id_user', $id)
                ->update(['email'
                => $request->input('userEmail')]);
            $user = DB::table('users')->where('id_user', $id)
                ->update(['address'
                => $request->input('userAddress')]);
            $user = DB::table('users')->where('id_user', $id)
                ->update(['phone'
                => $request->input('userPhone')]);
            $user = DB::table('users')->where('id_user', $id)
                ->update(['gender'
                => $request->input('userGender')]);
            $user = DB::table('users')->where('id_user', $id)
                ->update(['profile_picture'
                => $path]);
        }
        return redirect()->action('UserController@viewManageUser');
    }

    public function insertadmin(Request $request){
        $rules = array(
            'fullname' => 'required|min:5|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/',
            'userEmail' => 'required|email|unique:users,email',
            'userPassword' => 'required|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|min:5',
            'userAddress' => 'required|min:10',
            'userPhone' => 'required|numeric|min:11',
            'userGender' => 'required|',
            'role' => 'required',
            'userPic' => 'image|mimes:jpeg,png,jpg'
        );


        $validator = validator()->make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->messages();

            return redirect()->back()->withErrors($validator);
        }else {
            $path = $request->userPic->storeAs('', $request->userPic->getClientOriginalName());

            $user = new User();
            $user->fullname = $request->input('fullname');
            $user->email = $request->input('userEmail');
            $user->password = bcrypt($request->input('userPassword'));
            $user->phone = $request->input('userPhone');
            $user->gender = $request->input('userGender');
            $user->address = $request->input('userAddress');
            $user->role = $request->input('userRole');
            $user->profile_picture = $path;

            $user->save();
        }
    	return redirect()->action('UserController@viewManageUser');
    }
}
