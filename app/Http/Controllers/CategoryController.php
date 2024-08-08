<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moldels\Category;

class CategoryController extends Controller
{
    public function show(Category $category){
        return view('servicios',[
            'category' => $category,
            'servicios' => $category->servicios()->with('category')->latest()->paginate()
        ]);
    }
}
