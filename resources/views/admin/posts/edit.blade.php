@extends('layouts.dashboard')

@section('content')
    <div class="form-container">
        <form action="{{ route('admin.posts.update', ['post' => $post->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-section">
                <label for="titolo">Titolo:</label>
                <input type="text" id="titolo" name="title" placeholder="title" value="{{old('title', $post->title)}}">
            </div>
            <div class="form-section">
                <label for="testo">Testo articolo:</label>
                <textarea type="text" id="testo" name="content" placeholder="Inserisci testo">{{old('content', $post->content)}}</textarea>
            </div>
            <div class="form-section">
                <label for="categoria">Seleziona categoria:</label>
                <select id="categoria" name="category_id">
                    <option value="">Seleziona categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category-> id}}" {{ old('category_id', ($post->category->id ?? '')) == $category->id ? 'selected' : '' }}>
                            {{ $category-> name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-submit">
                <input type="submit" value="Modifica post">
            </div>
        </form>
    </div>
@endsection
