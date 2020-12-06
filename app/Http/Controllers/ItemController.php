<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request)
    {
        $estimate = $request->input('estimate');

        $items = $request->items;

        $delete_items_id = $request->delete_items;

        for($i=0; $i<count($delete_items_id); $i++){
            $delete_item = Item::find($delete_items_id[$i]);
            $delete_item->delete();
        }

        for($i=0; $i<count($items); $i++) {
            if (!empty($items[$i]['id'])) {
                $current_item = Item::find($items[$i]['id']);
                
                $current_item->name = $items[$i]['name'];
                $current_item->unit = $items[$i]['unit'];
                $current_item->quenity = $items[$i]['quenity'];
                $current_item->unit_price = $items[$i]['unit_price'];
                $current_item->other = $items[$i]['other'];
                $current_item->save();
            } else {
                $new_item = new Item();

                if(!empty($items[$i]['name'])) $new_item->name = $items[$i]['name'];
                $new_item->estimate_id = $estimate;
                if(!empty($items[$i]['unit'])) $new_item->unit = $items[$i]['unit'];
                if(!empty($items[$i]['quenity'])) $new_item->quenity = $items[$i]['quenity'];
                if(!empty($items[$i]['unit_price'])) $new_item->unit_price = $items[$i]['unit_price'];
                if(!empty($items[$i]['other'])) $new_item->other = $items[$i]['other'];
                $new_item->save();
            } 
        }
        $items = Item::where('estimate_id', $estimate)->get();
        return $items;
    }

    public function get(Request $request)
    {
        $estimate = $request->input('estimate');
        $items = Item::where('estimate_id', $estimate)->get();

        if ($items->isEmpty()) {
            $item = new Item();
            $item->estimate_id = $estimate;
            $item->save();
            
            return [$item];
        } else {
            return $items;
        }
    }
}
