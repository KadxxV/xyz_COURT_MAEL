<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        $tracks = $category->tracks()->with('user')->withCount('likes')->paginate(10);

        return view('app.categories.show', ['category' => $category, 'tracks' => $tracks,]);
    }
    public function index(): View
    {
        $categories = Category::all();
        return view('app.categories.index', compact('categories'));
    }



}
