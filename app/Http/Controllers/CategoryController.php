<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {

        $services = Service::where('category_id', $category->id)->get();

        return view('categories.show', compact('category', 'services'));
    }
}
