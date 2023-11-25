<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Log;
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

    public function edit(Category $category)
    {

        return view('categories.edit', [
            'category' => Category::findOrFail($category->id)
        ]);

    }

    public function store(CategoryRequest $request)
    {

        $request->validated();

        $category = Category::create(['category' => $request->category]);

        $this->appLog(
            $request->route()->getName(), 
            'CREATED', 
            'Category ID #' . $category->id . ' created', 
        );

        return redirect(route('categories.index'))->with('message', 'Category created successfully!');
        
    }

    public function update(CategoryRequest $request, Category $category)
    {

        $request->validated();

        Category::where('id', $category->id)->update(['category' => $request->category]);

        $this->appLog(
            $request->route()->getName(),
            'UPDATED',
            'Category ID #' . $category->id . ' updated',
        );

        return redirect(route('categories.index'))->with('message', 'Category updated successfully!');
        
    }
    
    public function destroy(Request $request, Category $category)
    {
        
        $category->delete();

        $this->appLog(
            $request->route()->getName(),
            'DELETED',
            'Category ID #' . $category->id . ' deleted',
        );
    
        return redirect(route('categories.index'))->with('message', 'Category deleted successfully!');    

    }
    
}
