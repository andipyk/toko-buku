@extends('layouts.global')

@section('title')
TODO title index cateogry
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('categories.index') }}">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Filter by category name">

                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                    &nbsp;
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">create</a>
                </div>
            </div>
        </form>
    </div>
</div>

<hr class="my-3">


<div class="row">
    <div class="col-md-12">
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
                    <td><a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection