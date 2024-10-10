@extends('layout.main')

@section('header-content')
    <h2 class="mt-5 mb-4">Modifica Libro</h2>
@endsection

@section('main-content')
    <div class="col-md-5">
        <form action="{{ route('book.update', $book->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" name="title" id="title" placeholder="Il nome della Rosa" value="{{ $book->title }}">
                <label for="title">Titolo</label>
            </div>
            <div class="mb-3 form-floating">
                <textarea class="form-control textarea-height" name="description" placeholder="Inserisci la descrizione" id="description">{{ $book->description }}</textarea>
                <label for="description">Descrizione (opzionale)</label>
            </div>
            <div class="mb-3 form-floating nr_pages_width">
                <input type="number" class="form-control" id="pages" name="pages" placeholder="10" value="{{ $book->pages }}">
                <label for="pages">N° Pagine (opzionale)</label>
            </div>
            <div class="mb-3 form-floating">
                <select class="form-select" aria-label="Default select example" name="author_id" id="author">
                    @foreach($authors as $author)
                        @if($author->id == $book->author_id)
                            <option selected value="{{ $author->id }}">{{ $author->name }}</option>
                        @else
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="author">Autore</label>
            </div>
            <div class="mb-4 form-floating">
                <select class="form-select" aria-label="Default select example" name="category_id" id="category">
                    @foreach($categories as $category)
                        @if($category->id == $book->category_id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                <label for="category">Categoria</label>
            </div>
            <div class="mb-3 form-floating">
                <input type="file" class="form-control" name="cover_image" id="cover" placeholder="Copertina Libro">
                <label for="cover">Copertina del Libro (opzionale)</label>
            </div>
            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Aggiorna il Libro</button>
                <a href="{{ route('home') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection
