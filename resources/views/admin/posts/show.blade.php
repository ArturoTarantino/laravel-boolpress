@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>
        <div class="my-3"><span class="font-weight-bold">Slug:</span> {{ $post->slug }}</div>
        <div class="my-3"><span class="font-weight-bold">Categoria:</span> {{ $post->category ? $post->category->name : 'nessuna' }}</div>

        <div class="my-3">
            <span class="font-weight-bold">Tags:</span>
            @forelse ($post->tags as $tag)
                {{ $tag->name }}
                @if (!$loop->last)
                    ,
                @endif
            @empty
                nessuno
            @endforelse
        </div>

        @if ($post->cover)
            <img class="img-show" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
        @endif

        <p>{{ $post->content }}</p>

        <a class="btn btn-primary mb-2" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modifica post</a>

        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il post?')">Elimina</button>
        </form>
        
    </section>
@endsection