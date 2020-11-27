@extends('master')

@section('title', 'Sign In')
@section('content')

<div id="container">
        <div id="Sign_In">
            <span>Sign In</span>
        </div>
        <svg class="outer_line">
                <rect fill="transparent" stroke="rgba(112,112,112,1)" stroke-width="1px" stroke-linejoin="miter" stroke-linecap="butt" stroke-miterlimit="4" shape-rendering="auto" id="outer_line" rx="0" ry="0" x="0" y="0" width="660" height="352">
                </rect>
        </svg>
    @if ($errors->any())
        <div class="isa_error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
        <form action="signin" method="post">
            @csrf
                <div id="username">
                        <div id="Email_address">
                            <input name="userEmail" type="email" placeholder="Email Address">
                        </div>
                </div>
                <div id="password">
                        <div id="Password">
                            <input name="userPassword" type="password" placeholder="Password">
                        </div>
                </div>
                <div id="remmber_me">
                        <div id="Remember_Me">
                            <input type="checkbox" name="remember_Me" value="yes">
                            <span>Remember Me</span>
                        </div>
                </div>
                <div id="btnsignin">
                    <button type="submit">Sign In</button>
                </div>
        </form>
</div>

@endsection