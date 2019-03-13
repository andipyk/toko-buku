@extends('layouts.global')

@section('title')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('categories.index') }}">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Filter by category name"
                value="{{ Request::get('name') }}">

                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                    &nbsp;
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">create</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link active">Published</a></li>
            <li class="nav-item"><a href="{{ route('categories.trash') }}" class="nav-link">Trash</a></li>
        </ul>
    </div>
</div>

<hr class="my-3">


<div class="row">
    <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Slug</b></th>
                    <th><b>Image</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        @if ($category->image)
                        <img src="{{ asset('storage/'.$category->image) }}" width="48px">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>
                    <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST" onsubmit="return confirm('Move category to trash?')">
                        @csrf
                        <input type="hidden" name="_method" value="Delete">
                        {{-- Hanya untuk kerapian Edit dan Detail ada dalam form --}}
                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm">Edit</a> <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="btn btn-warning btn-sm">Detail</a>

                        <input type="submit" value="Trash" class="btn btn-danger btn-sm">
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection