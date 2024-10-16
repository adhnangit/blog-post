@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    @foreach($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
