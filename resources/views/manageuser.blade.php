@extends('master')

@section('title', 'Manage User')
@section('content')
<div id="container_manageuser">
    <div class="tengah" style="left: 10px;">
        <div class="insertbtnuser">
            <a href="/insertadmin">
                <button style="width: 250px">Insert User</button>
            </a>
        </div>
        <table id="tablemanageuser" style="width: 97%; height: 450px;overflow: auto;display: block">
            <tr style="text-align: center; border-bottom: 1px solid black;">
                <th>Profile Picture</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($user as $u)
            <tr style="font-size: 20px;">
                <th>
                    <img src="storage/{{$u->profile_picture}}" alt="Tidak dapat memuat" style="width: 100px; height: 100px;">
                </th>
                <th><span>{{$u->fullname}}</span></th>
                <th><span>{{$u->email}}</span></th>
                <th><span>{{$u->phone}}</span></th>
                <th><span>{{$u->address}}</span></th>
                <th><span>{{$u->gender}}</span></th>
                <th><span>{{$u->role}}</span></th>
                <th>
                    <a href="/updatemanageuser/{{$u->id_user}}">
                    <button style="width: 100%;">Edit</button>
                    </a>
                </th>
                <th>
                    <a href="/deleteuser/{{$u->id_user}}">
                        <button style="width: 100%;">Delete</button>
                    </a>
                </th>
            </tr>
            @endforeach
        </table>
        
    </div>
</div>
@endsection