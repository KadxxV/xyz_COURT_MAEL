<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $tracks = $category->tracks()
            ->with(['user', 'week'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('categories.show', compact('category', 'tracks'));
    }

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }


}
