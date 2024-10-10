<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('list_category', compact('categories'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('create_category', compact('categories'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());
        return redirect()->route('categories')->with('success', 'Categoria aggiunta correttamente');
    }

    public function edit(Category $category): View
    {
        return view('edit_category', compact('category'));
    }

    public function update(CategoryRequest $request): RedirectResponse
    {
        Category::find($request->get('id'))->update(['name'=>$request->get("name")]);
        return redirect()->route('categories')->with('success', 'Categoria aggiornata correttamente');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories')->with('success', 'Categoria eliminata correttamente');
    }
}
