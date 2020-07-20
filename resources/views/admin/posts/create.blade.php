@extends('layouts.dashboard')

@section('content')
    <div class="form-container">
        <form action="{{ route('admin.posts.store')}}" method="post">
            @csrf
            <div class="form-section">
                <label for="titolo">Titolo:</label>
                <input type="text" id="titolo" name="title" placeholder="title" value="{{old('title')}}">
            </div>
            <div class="form-section">
                <label for="testo">Testo articolo:</label>
                <textarea type="text" id="testo" name="content" placeholder="Inserisci testo">{{old('content')}}</textarea>
            </div>
            <div class="form-section">
                <label for="categoria">Seleziona categoria:</label>
                <select id="categoria" name="category_id">
                    <option value="">Seleziona categoria</option>
                    @foreach ($categories as $category)
                        <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category-> id}}"> {{ $category-> name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-section">
                <p>Seleziona Tag:</p>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-submit">
                <input type="submit" value="Inserisci nuovo post">
            </div>
        </form>
    </div>
@endsection
