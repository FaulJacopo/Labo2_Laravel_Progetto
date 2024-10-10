@extends('layout.main')

@section('header-content')
<h2 class="mt-5 mb-4">Aggiungi Libro</h2>
@endsection

@section('main-content')
<div class="col-md-5">
    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 form-floating">
            <input type="text" class="form-control" name="title" id="title" placeholder="Il nome della Rosa">
            <label for="title">Titolo</label>
        </div>
        <div class="mb-3 form-floating">
            <textarea class="form-control textarea-height" name="description" placeholder="Inserisci la descrizione" id="description"></textarea>
            <label for="description">Descrizione (opzionale)</label>
          </div>
        <div class="mb-3 form-floating nr_pages_width">
            <input type="number" class="form-control" id="pages" name="pages" placeholder="10">
            <label for="pages">N° Pagine (opzionale)</label>
        </div>
        <div class="mb-3 form-floating">
            <select class="form-select" aria-label="Default select example" name="author_id" id="author">
                <option selected>Seleziona l'Autore</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            <label for="author">Autore</label>
        </div>
        <div class="mb-4 form-floating">
            <select class="form-select" aria-label="Default select example" name="category_id" id="category">
                <option selected>Seleziona la Categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <label for="category">Categoria</label>
        </div>
        <div class="mb-3 form-floating">
            <input type="file" class="form-control" id="cover"  name="cover_image" placeholder="Copertina Libro">
            <label for="cover">Copertina del Libro (opzionale)</label>
        </div>
        <div class="pt-4 border-top">
            <button type="submit" class="btn btn-primary me-3">Aggiungi il Libro</button>
            <a href="{{ route('home') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
        </div>
    </form>
</div>
@endsection
