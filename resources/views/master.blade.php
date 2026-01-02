<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
		function startTime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('txt').innerHTML =
					h + ":" + m + ":" + s;
			var t = setTimeout(startTime, 500);
		}
		function checkTime(i) {
			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
		}
	</script>
</head>
<body onload="startTime()">

<div id="Login" class="bg-white">
		<div id="Header">
			<div id="login_regis">
				<div id="Mimi_Shop">
					<a href="/home">MimiShop</a>
				</div>
			@if(Session::get('role') == "User")
				<ul id="user">
					<li><a href="/feedbackUser">Feedback</a></li>
					<li><a href="/cart">My cart</a></li>
					<li><a href="/transaction">My Transaction</a></li>
					<li><a href="/profile">Profile</a></li>
					<li><a href="/signout">Logout</a></li>
				</ul>
			@elseif (Session::get('role') == "Admin")
					<ul style="admin">
						<li><a href="/manageFeedback">Manage Feedback</a></li>
						<li><a href="/manageuser">Manage User</a></li>
						<li><a href="/managefigure">Manage Figure</a></li>
						<li><a href="/managecategory">Manage Category</a></li>
						<li><a href="/transactionadmin">Transaction</a></li>
						<li><a href="/profile">Profile</a></li>
						<li><a href="/signout">Logout</a></li>
					</ul>
				@else
				@if($_SERVER['REQUEST_URI'] != '/register' && $_SERVER['REQUEST_URI'] != '/signin')

					<div id="Login_A0_Text_7">
						<a href="/signin">Login</a>
					</div>
					<div id="Register">
						<a href="/register">Register</a>
					</div>
					<div id="_">
						<span>|</span>
					</div>
					 @endif
			@endif
			</div>
        </div>

		@yield('content')

		<div id="Footer" style="bottom: 0%">
			<div id="ID2019_Copyright__Bluejack_17_">
				<span>2019 Copyright: Bluejack 17-2</span>
			</div>
		</div>
</div>

</body>
</html>
