<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

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
        Flash::success('Категория успешна создана!');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {

        $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required'
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }



}
