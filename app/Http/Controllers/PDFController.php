<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Item;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function index(Request $request){
        $estimate_id = $request->input('estimate');
        $estimate = Estimate::find($estimate_id);
        $items = Item::where('estimate_id', $estimate_id)->get();
        $item_price = Item::where('estimate_id', $estimate_id)->get(['quantity', 'unit_price']);
        $sum_price = 0;

        for($i=0; $i<count($item_price); $i++){
            $calculation_price = $item_price[$i]['quantity'] * $item_price[$i]['unit_price'];
            $sum_price += $calculation_price;
        }

    	$pdf = PDF::loadView('pdf/generate_pdf', [
            'estimate' => $estimate,
            'sum_price' => $sum_price,
            'items' => $items,
        ]);

    	return $pdf->stream();

    }
}
