@extends('layout.main')

@section('header-content')
    <h2 class="mt-5 mb-4">Modifica Autore</h2>
@endsection

@section('main-content')
    <div class="col-md-5">
        <form action="{{ route('author.update', $author->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="name" name="name" placeholder="Umberto Eco" value="{{ $author->name }}">
                <label for="name">Nome e Cognome</label>
            </div>
            <div class="mb-3 form-floating birthday_width">
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $author->birthday }}" >
                <label for="birthday">Data di Nascita (opzionale)</label>
            </div>
            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Aggiungi l'Autore</button>
                <a href="{{ route('authors') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection

