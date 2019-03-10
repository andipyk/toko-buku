@extends('layouts.global')

@section('title')
Edit User
@endsection

@section('content')
<div class="col-md-8">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('users.update', ['id'=> $user->id]) }}"
        method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <label for="Name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="{{ $user->name }}"><br><br>

        <label for="Status">Status</label><br>
        <input type="radio" class="form-control" name="status" id="active" value="ACTIVE"
            {{ $user->status == "ACTIVE" ? "checked" : "" }}> <label for="active">ACTIVE</label>
        <input type="radio" class="form-control" name="status" id="inactive" value="INACTIVE"
            {{ $user->status !== "ACTIVE" ? "checked" : "" }}> <label for="inactive">INACTIVE</label>
        <br><br>

        <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN" value="ADMIN">
        <label for="ADMIN">Administrator</label>

        <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="STAFF" value="STAFF">
        <label for="STAFF">Staff</label>

        <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="CUSTOMER" value="CUSTOMER">
        <label for="CUSTOMER">Customer</label>

        <br><br>

        <label for="PhoneNumber">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
        <br><br>

        <label for="Address">Address</label>
        <textarea name="address" id="address" class="form-control">{{ $user->address }}</textarea>
        <br><br>

        <label for="AvatarImage">Avatar Image</label><br>
        @if ($user->avatar)
        <img src="{{ asset('storage/'.$user->avatar) }}" width="120px" /> <br>
        @else
        No Avatar
        @endif
        <input type="file" name="avatar" id="avatar" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin menganti avatar</small>
        <br>

        <hr class="my-3"><br>
        <label for="Email">Email</label>
        <input type="email" name="email" id="email" placeholder="user@example.com" class="form-control" value="{{ $user->email }}"
            disabled>
        <br><br>

        <input type="submit" value="Save" class="btn btn-primary">

    </form>
</div>
@endsection