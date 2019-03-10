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
        <form action="{{ route('users.index') }}">
            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="keyword" value="{{ Request::get('keyword') }}" class="form-control"
                        placeholder="Filter by Email">
                </div>
                <div class="col-md-7">
                    <input type="radio" name="status" value="ACTIVE" class="form-control" id="active"
                    {{ Request::get('status') == 'ACTIVE' ? 'checked' : '' }}><label for="active">Active</label>
                    <input type="radio" name="status" value="INACTIVE" class="form-control" id="inactive"><label for="inactive"
                    {{ Request::get('status') == 'INACTIVE' ? 'checked' : '' }}>Inactive</label>
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
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
                    @if ($user->status)
                        {{ $user->status }}
                    @else
                        Belum Verifikasi	
                    @endif
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
    <tfoot><tr><td colspan="10"> {{ $users->appends(Request::all())->links() }}</td></tr></tfoot>
</table>


@endsection