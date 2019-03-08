@extends('layouts.global')

@section('title')
    Create New User
@endsection

@section('content')
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="Name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name"><br><br>

        <label for="Username">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username"><br><br>

        <label for="Roles">Roles</label><br>
        <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN">
        <label for="ADMIN">Administrator</label>
        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF">
        <label for="STAFF">Staff</label>
        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER">
        <label for="Customer">Customer</label><br><br>
        
        <label for="PhoneNumber">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control">
        <br><br>

        <label for="Address">Address</label>
        <textarea name="address" id="address" class="form-control"></textarea>
        <br><br>

        <label for="AvatarImage">Avatar Image</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
        <br>

        <hr class="my-3"><br>
        <label for="Email">Email</label>
        <input type="email" name="email" id="email" placeholder="user@example.com" class="form-control">
        <br><br>

        <label for="Password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" class="form-control">
        <br><br>

        <label for="PasswordConfirmation">Password Confirmation</label>
        <input type="password" name="password_conformation" id="password_conformation" placeholder="password conformation" class="form-control">
        <br><br>

        <input type="submit" value="Save" class="btn btn-primary">
        
    </form>
@endsection

