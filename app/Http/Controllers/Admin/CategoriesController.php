<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();  //вытащим все категории

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {

        return view('admin.categories.create');
    }


    //получаем данные из запроса формы и тд.
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required'
        ]);

        Category::create($request->all()); // создаем категорию
        return redirect()->route('categories.index');
    }

}
