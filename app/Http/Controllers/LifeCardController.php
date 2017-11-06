<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LifeCard;

class LifeCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $allCards = LifeCard::all();
        return view("Pages.LifeCard",['allCards' => $allCards]);
    }

    public function selection(Request $r)
    {
        if($r->ajax())
        {
            $card1 = $r->input("card1");
            $card2 = $r->input("card2");
            $card3 = $r->input("card3");
            $card4 = $r->input("card4");
            $Selection = LifeCard::find([$card1,$card2,$card3,$card4]);
            return response($Selection);
        }
    }
    public function AdminShow()
    {
        $allCards = LifeCard::all();
        return view("Pages.CreateLifeCard",['allCards' => $allCards]);
    }
    public function store(Request $r)
    {
        if($r->ajax())
        {
            $card = new LifeCard();
            $card->Question = $r->question;
            $card->save();
            $allCard = LifeCard::all();
            return response($allCard);
        }
    }
    public function update(Request $r, LifeCard $card)
    {
        if($r->ajax())
        {
            $card->Question = $r->question;
            $card->save();
            $allCard = LifeCard::all();
            return response($allCard);
        }
    }
    public function delete(LifeCard $card)
    {
        $card->delete();
        $allCard = LifeCard::all();
        return response($allCard);
    }
}
