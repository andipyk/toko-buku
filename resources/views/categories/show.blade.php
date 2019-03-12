@extends('layouts.global')

@section('title')
    Detail Category
@endsection

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <label>Category Name</label><br>
                {{ $category->name }}<br><br>
                <label>Category Slug</label><br>
                {{ $category->slug }}<br><br>
                <label>Category Image</label><br>
                @if ($category->image)
                    <img src="{{ asset('storage/'.$category->image) }}" width="120px" ><br><br>
                @endif
            </div>
        </div>
    </div>
@endsection