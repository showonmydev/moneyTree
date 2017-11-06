<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Triva;
class TrivaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show($cat)
    {
        $allTriva = Triva::with('categories')->get()->where('categories_id',$cat);

        return view('Pages.triva',['allTriva' => $allTriva]);
    }
    public function select(Request $r,Triva $triva)
    {

        if($r->ajax())
        {
            return response($triva);
        }
    }
    public function adminShow()
    {
        $allTreeVia = Triva::with('categories')->get();
        $allCategory = Category::all();
        return view('Pages.CreateTrevia',['allTreeVia' => $allTreeVia,"allCategory" => $allCategory]);
    }

    public function store(Request $r)
    {
        if($r->ajax())
        {
            $TreeVia = new Triva();
            $TreeVia->question = $r->question;
            $TreeVia->answers = $r->options;
            $TreeVia->correct = $r->correctOption;
            $TreeVia->categories_id = $r->category;
            $TreeVia->save();
            $allTreeVia = Triva::with('categories')->get();
            return response($allTreeVia);
        }
    }
    public function update(Request $r,Triva $TreeVia)
    {
        if($r->ajax()) {
            $TreeVia->question = $r->question;
            $TreeVia->answers = $r->options;
            $TreeVia->correct = $r->correctOption;
            $TreeVia->categories_id = $r->category;
            $TreeVia->save();
            $allTreeVia = Triva::with('categories')->get();
            return response($allTreeVia);
        }
    }
    public function delete(Request $r,Triva $TreeVia)
    {
        if($r->ajax()) {
            $TreeVia->delete();
            $allTreeVia = Triva::with('categories')->get();
            return response($allTreeVia);
        }
    }

}
