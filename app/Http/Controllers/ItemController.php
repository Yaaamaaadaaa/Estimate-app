<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;

        $item->save();

        $items = Item::all();
        return $items;
    }
}
