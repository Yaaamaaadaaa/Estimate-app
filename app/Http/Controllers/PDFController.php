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

    	$pdf = PDF::loadView('pdf/generate_pdf', [
            'estimate' => $estimate,
            'items' => $items,
        ]);

    	return $pdf->stream();

    }
}
