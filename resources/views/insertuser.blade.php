@extends('master')

@section('title', 'Insert')
@section('content')

<div id="containerInsert">
    @if ($errors->any())
        <div class="isa_error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
        <form action="insertadmin" method="post" enctype="multipart/form-data">
            @csrf
            <div id="Sign_Up" style="left:130px;">
                <span>Insert New User</span>
            </div>
            <div id="fullname" style="">
                    <div id="Fullname">
                        <input type="text" name="fullname" placeholder="Fullname"> 
                    </div>
            </div>
            <div id="email1">
                    <div id="Email_address1">
                            <input type="email" name="userEmail" placeholder="Email">
                    </div>
            </div>
            <div id="password1">
                    <div id="Password_A1_Text_9">
                            <input type="password" name="userPassword" placeholder="Password">
                    </div>
            </div>
            <div id="address1" style="top: 160px;">
                    <div id="Password1">
                        <input type="text" name="userAddress" placeholder="Address">
                    </div>
            </div>
            <div id="phone" style="top: 200px;">
                <div id="phone1">
                    <input type="text" name="userPhone" id="" placeholder="Phone Number">
                </div>
            </div>
            <div id="gender" style="top: 240px;">
                <div id="gender_A1_Text_6">
                    <select name="userGender">
                        <option disabled selected value >Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div id="role" style="top: 280px; left: 30px;">
                <div id="userRole">
                    <select name="role" style="width: 370px; height: 30px;">
                        <option disabled selected value >Role</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="Pp">
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
                <button type="submit">Insert</button>
            </div>        
        </form>
</div>
@endsection


