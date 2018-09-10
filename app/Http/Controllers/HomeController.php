<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.9.18
 * Time: 15.34
 */

namespace App\Http\Controllers;


use App\Category;

use Illuminate\View\View;

class HomeController extends Controller
{

    public function index()
    {

        $categories = Category::all();  //вытащим все категории

        return view('welcome', compact('categories'));

    }

}