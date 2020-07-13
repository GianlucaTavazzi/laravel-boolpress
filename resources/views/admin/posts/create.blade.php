@extends('layouts.app')

@section('content')
    <div class="form-container">
        <form action="{{ route('admin.posts.store')}}" method="post">
            @csrf
            <div class="form-section">
                <label for="name">Titolo:</label>
                <input type="text" id="titolo" name="titolo" placeholder="title" value="{{old('title')}}">
            </div>
            <div class="form-section">
                <label for="lastname">Testo articolo:</label>
                <textarea type="text" name="content" placeholder="Inserisci testo" value="{{old('content')}}"></textarea>
            </div>
            <div class="form-submit">
                <input type="submit" value="Inserisci nuovo post">
            </div>
        </form>
    </div>
@endsection
