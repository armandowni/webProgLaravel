@extends('master')

@section('title', 'Register')
@section('content')
        <div id="container1">
            @if ($errors->any())
                <div class="isa_error">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form action="/register" method="post" enctype="multipart/form-data">
                @csrf
                <div id="Sign_Up">
                    <span>Sign Up</span>
                </div>
                <div id="fullname">
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
                <div id="Confirm_password1">
                        <div id="Password_A1_Text_8">
                            <input type="password" name="userConfirmPassword" placeholder=" Confirm Password">
                        </div>
                </div>
                <div id="address1">
                        <div id="Password1">
                            <input type="text" name="userAddress" placeholder="Address">
                        </div>
                </div>
                <div id="phone">
                    <div id="phone1">
                        <input type="text" name="userPhone" id="" placeholder="Phone Number">
                    </div>
                </div>
                <div id="gender">
                    <div id="gender_A1_Text_6">
                        <select name="userGender">
                            <option disabled selected value>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
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
                <div id="term">
                    <div id="I_Agree_to_Terms_and_Condition">
                        <input type="checkbox" name="termandcondition" value="yes">
                        <span>Term and Condition</span>
                    </div>
                </div>
                <div id="btnregister">
                    <button type="submit">Register</button>
                </div>        
            </form>
        </div>
@endsection