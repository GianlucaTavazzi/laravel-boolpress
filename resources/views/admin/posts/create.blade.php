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
            <div class="form-submit">
                <input type="submit" value="Inserisci nuovo post">
            </div>
        </form>
    </div>
@endsection
