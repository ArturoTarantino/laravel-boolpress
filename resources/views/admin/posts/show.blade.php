@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>
        <div class="my-3"><span class="font-weight-bold">Slug:</span> {{ $post->slug }}</div>
        <p>{{ $post->content }}</p>
    </section>
@endsection