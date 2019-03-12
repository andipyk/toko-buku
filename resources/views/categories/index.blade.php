@extends('layouts.global')

@section('title')
TODO title index cateogry
@endsection

@section('content')
<a href="{{ route('categories.create') }}" class="btn btn-primary">create</a>
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
                    <td>[ TODO action for category ]</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection