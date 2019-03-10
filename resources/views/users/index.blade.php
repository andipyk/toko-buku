@extends('layouts.global')

@section('title')
User List
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('users.index') }}"> {{-- Jangan Pakai method Post --}}
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="keyword" id="keyword" value="{{ Request::get('keyword') }}" class="form-control col-md-10">
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row">
    <div class="col-md-12 text-right">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Username</b></th>
            <th><b>Email</b></th>
            <th><b>Status</b></th>
            <th><b>Avatar</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->status == 'ACTIVE')
                <span class="badge badge-success">
                    {{ $user->status }}
                </span>
                @else
                <span class="badge badge-danger">
                    Belum Verifikasi
                    {{--  {{ $user->status }}  --}}
                </span>
                @endif
            </td>
            <td>@if($user->avatar)
                <img src="{{ asset('storage/'.$user->avatar) }}" width="70px" />
                @else
                N/A
                @endif
            </td>
            <td>
                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info text-white btn-sm">Edit</a>
                <form action="{{ route('users.destroy', ['id' => $user->id ]) }}" class="d-inline" method="post"
                    onsubmit="return confirm('Delete this user permanently?')">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
                <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Detail</a>
            </td>

            {{-- <td>[TODO: actions]</td> --}}
        </tr>
        @endforeach
    </tbody>
</table>


@endsection