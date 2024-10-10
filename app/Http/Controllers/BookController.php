<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $authors = Author::all();
        $categories = Category::all();
        $books = Book::orderBy('title', 'asc')->get();
        return view('list_book', compact('books', 'authors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $books = Book::orderBy('title', 'asc')->get();
        $authors = Author::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('create_book', compact('books', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request): RedirectResponse
    {
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(400, 520);
            $image->save(public_path('img/' . $fileName));
            $imagePath = 'img/' . $fileName;
        } else {
            $imagePath = 'img/no-cover.webp';
        }
        $validatedData = $request->validated();
        $validatedData['cover_image'] = $imagePath;

        Book::create($validatedData);
        return redirect()->route('home')->with('success', 'Vinile aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book): View
    {
        return view('detail_book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book): View
    {
        $authors = Author::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('edit_book', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $imagePath = $book->cover_image;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(400, 520);
            $image->save(public_path('img/' . $fileName));

            $imagePath = 'img/' . $fileName;

            if ($book->cover_image && $book->cover_image !== 'img/no-cover.webp') {
                File::delete(public_path($book->cover_image));
            }
        }

        $validatedData = $request->validated();
        $validatedData['cover_image'] = $imagePath;
        $book->update($validatedData);
        return redirect()->route('home')->with('success', 'Libro aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('home')->with('success', 'Libro eliminato correttamente');
    }
}
