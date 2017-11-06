<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    public function AdminShow()
    {
        $allCards = User::all();
        return view("Pages.CreateAccounts",['allCards' => $allCards]);
    }
    public function store(Request $r)
    {
        if($r->ajax())
        {
            $card = new User();
            $card->name = $r->FullName;
            $card->userName = $r->UserName;
            $card->Password = Hash::make($r->Password);
            $card->save();
            $allCard = User::all();

            return response($allCard);
        }
    }
    public function update(Request $r, User $User)
    {
        if($r->ajax())
        {
            $User->name = $r->FullName;
            $User->userName = $r->UserName;
            $User->Password = Hash::make($r->Password);
            $User->save();
            $allCard = User::all();
            return response($allCard);
        }
    }
    public function delete(Request $r, User $User)
    {
        if($r->ajax()) {
            $User->delete();
            $allCard = User::all();
            return response($allCard);
        }
    }
}
