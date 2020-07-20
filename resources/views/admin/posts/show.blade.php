@extends('layouts.dashboard')

@section('content')
    <div class="show-container">
        <div class="show-header">
            <h1>Dettagli post</h1>
            <a class="details" href="{{ route('admin.posts.edit', ['post' => $post->id])}}">Modifica post</a>
        </div>
        <div class="show-description">
            <p>Titolo: {{ $post->title }} </p>
            <p>Testo: {{$post->content}} </p>
            <p>Slug: {{$post->slug}} </p>
            <p>Categoria: {{$post->category->name ?? '-'}} </p>
            <p>Tags:
                @forelse ($post->tags as $tag)
                    {{ $tag->name}}{{ $loop->last ? '' : ','}}
                @empty
                    -
                @endforelse
            </p>
            <p>Creato il: {{$post->created_at}} </p>
            <p>Modificato il: {{$post->updated_at}} </p>
        </div>
    </div>
@endsection
