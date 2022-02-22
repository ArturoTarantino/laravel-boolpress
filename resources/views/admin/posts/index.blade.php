@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>Lista posts</h1>
        <div class="row row-cols-3">
            @foreach ($posts as $post)
                {{-- single card --}}
                <div class="col">
                    <div class="card my-3">
                        <div class="card-body">
                          <h5 class="card-title">{{ $post->title }}</h5>
                          <p class="card-text">{{ $post->content }}</p>
                          <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Leggi il post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>  
    </section>
@endsection