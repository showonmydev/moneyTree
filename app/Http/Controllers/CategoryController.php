<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public  function  show(Request $r)
    {
        if($r->ajax())
        {
            $allcat = Category::all();
            return response($allcat);
        }
    }
    public function AdminShow()
    {
        $allCategory =Category::all();
        return view("Pages.CreateTreeViaCategory",['allCategory' => $allCategory ]);
    }
    public function store(Request $r)
    {
        if($r->ajax())
        {
            $cat = new Category();
            $cat->name = $r->name;
            $cat->save();
            $allCategory =Category::all();
            return response($allCategory);
        }
    }
    public function update(Request $r, Category $Category)
    {
        if($r->ajax())
        {
            $Category->name = $r->name;
            $Category->save();
            $allCategory =Category::all();
            return response($allCategory);
        }
    }
    public function delete(Request $r, Category $Category)
    {
        $Category->delete();
        $allCategory =Category::all();
        return response($allCategory);
    }
}
