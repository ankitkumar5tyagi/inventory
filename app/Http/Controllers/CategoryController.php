<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view ('category.create');
    }

    public function store(Request $request)
    {
        $field = $request->validate([
            'name' => 'required|max:25',
            'code' => 'max:8',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        Category::create($field);
        return redirect()->route('category.index');
    }

    
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $field = $request->validate([
            'name' => 'required|max:25',
            'code' => 'max:8',
            'description' => 'nullable',
            'status' => 'boolean'
        ]);

        $category->update($field);
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('category.index');
    }
}
