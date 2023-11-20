<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {

        return view('categories.index', [
            'categories' => Category::all()
        ]);

    }

    public function create()
    {

        return view('categories.create');

    }

    public function store(CategoryRequest $request)
    {

        $request->validated();

        Category::create(['category' => $request->category]);

        return redirect(route('categories.index'))->with('message', 'Category created successfully!');

    }
    
}
