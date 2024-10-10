@extends('layout.main')

@section('header-content')
    <h2 class="mt-5 mb-4">Modifica Categoria</h2>
@endsection

@section('main-content')
    <div class="col-md-5">
        <form action="{{ route('category.update',$category['id']) }}" method="post">
            @csrf
            <input type="hidden" value="{{ $category->id }}" name="id">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3 form-floating">
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Romanzo, Saggio,...">
                <label for="title">Nome della Categoria</label>
            </div>
            <div class="pt-4 border-top">
                <button type="submit" class="btn btn-primary me-3">Aggiungi Categoria</button>
                <a href="{{ route('categories') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
            </div>
        </form>
    </div>
@endsection
