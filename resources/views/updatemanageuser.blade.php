@extends('master')

@section('title', 'Update User')
@section('content')

<div id="containerInsert">
    @if ($errors->any())
        <div class="isa_error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
        <form action="/updatemanageuser" method="post" enctype="multipart/form-data">
            @csrf
            <div id="Sign_Up" style="left:140px;">
                <span>Update User</span>
            </div>
            <div id="fullname" style="left: 29px">
                    <div id="Fullname">
                        <input type="text" name="fullname" placeholder="Fullname" value="{{$profile->fullname}}" style="width: 370px; height: 40px;">
                    </div>
            </div>
            <div id="email1" style="top: 90px; left: 29px;">
                    <div id="Email_address1">
                            <input type="email" name="userEmail" placeholder="Email" value="{{$profile->email}}" style="width: 370px; height: 40px;">
                    </div>
            </div>
            <div id="address1" style="top: 145px; left: 29px;">
                    <div id="Password1">
                        <input type="text" name="userAddress" placeholder="Address" value="{{$profile->address}}" style="width: 370px; height: 40px;">
                    </div>
            </div>
            <div id="phone" style="top: 200px; left: 29px;">
                <div id="phone1">
                    <input type="text" name="userPhone" id="" placeholder="Phone Number" value="{{$profile->phone}}" style="width: 370px; height: 40px;">
                </div>
            </div>
            <div id="gender" style="top: 250px; left: 29px;">
                <div id="gender_A1_Text_6">
                    <select name="userGender" style="width: 370px; height: 40px;">
                        <option value="{{$profile->gender}}" >{{$profile->gender}}</option>
                        @if($profile->gender == "Male"){
                        <option value="Female">Female</option>
                        }
                        @else{
                        <option value="Male">Male</option>
                        }
                        @endif
                    </select>
                </div>
            </div>
            <div id="role" style="top: 150px; left: 20px;">
                <div id="role">
                    <select name="role" style="width: 370px; height: 40px;">
                        <option value="{{$profile->role}}" >{{$profile->role}}</option>
                            @if($profile->role == "Admin"){
                            <option value="User">User</option>
                            }
                            @else{
                            <option value="Admin">Admin</option>
                            }
                            @endif
                    </select>
                </div>
            </div>
            <div class="Pp" style="top: 350px">
                <div id="button_browse" class="button_browse">
                    <div id="Browse___">
                        <input type="file" name="userPic" accept="image/*">
                    </div>
                </div>
                <div id="pp">
                    <span>Profile Picture</span>
                </div>
            </div>
            <div id="btnregister">
                <button type="submit" name="submitBtn" value="{{$profile->id_user}}">Update</button>
            </div>        
        </form>
</div>
@endsection


