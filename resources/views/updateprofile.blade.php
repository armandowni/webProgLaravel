@extends('master')

@section('title', 'Profile')
@section('content')
        <div id="container1">
            @if ($errors->any())
                <div class="isa_error">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form action="profile" method="post" enctype="multipart/form-data">
                @csrf
                <div id="Sign_Up" style="left: 140px;">
                    <span>Personal Info</span>
                </div>
                <div id="fullname">
                        <div id="Fullname">
                            <input type="text" name="fullname" placeholder="Fullname" value="{{$profile->fullname}}" style="width: width: 370px;
                            height: 50px;">
                        </div>
                </div>
                <div id="email1" style="top: 100px">
                        <div id="Email_address1">
                                <input type="email" name="userEmail" placeholder="Email" value="{{$profile->email}}" style="width: width: 370px;
                                height: 50px;">
                        </div>
                </div>
                <div id="address1" style="top: 160px">
                        <div id="Password1">
                            <input type="text" name="userAddress" placeholder="Address" value="{{$profile->address}}" style="width: width: 370px;
                            height: 50px;">
                        </div>
                </div>
                <div id="phone" style="top: 220px">
                    <div id="phone1">
                        <input type="text" name="userPhone" id="" placeholder="Phone Number" value="{{$profile->phone}}" style="width: width: 370px;
                        height: 50px;">
                    </div>
                </div>
                <div id="gender" style="">
                    <div id="gender_A1_Text_6">
                        <select name="userGender" style="width: width: 370px;
                        height: 50px;">
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
                    <button type="submit">Edit Profile</button>
                </div>
            </form>
        </div>
@endsection
