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

    public function show(Request $request)
    {
        $estimate = $request->input('estimate');
        $items = Item::where('estimate_id', $estimate)->get();

        if ($items == null){
            $item = new Item();
            $item->name = '新規作成';
            $item->estimate_id = $estimate;
            $item->save();

            $items = Item::where('estimate_id', $estimate)->get();

            return $items;

        } else {

            return $items;

        }
    }
}
