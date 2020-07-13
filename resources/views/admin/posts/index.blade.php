@extends('layouts.dashboard')

@section('content')
    <div class="tab-container">
        <div class="tab-header">
            <h1>Lista post</h1>
            <a class="details" href="{{ route('admin.posts.create')}}">Inserisci nuovo post</a>
        </div>
        <table>
            <thead>
                <th>ID</th>
                <th>Titolo</th>
                <th>Slug</th>
                 <th>Azioni</th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td> {{ $post->id }} </td>
                        <td> {{ $post->title }} </td>
                        <td> {{ $post->slug }} </td>
                        <td>
                            <a class="details" href="{{ route('admin.posts.show', ['post' => $post->id])}}">Dettagli</a>
                            <a class="modify" href="{{ route('admin.posts.edit', ['post' => $post->id])}}">Modifica</a>
                            <form action="{{ route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Elimina">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Non è presente nessun post
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
