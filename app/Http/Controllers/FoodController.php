<?php

namespace App\Http\Controllers;

use App\FoodPoint;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Request $r)
    {
        if($r->ajax())
        {
            $rand = FoodPoint::all()->first();
            return response($rand);
        }
    }
    public function store(Request $r)
    {
        if($r->ajax())
        {
            
        }
    }
}
