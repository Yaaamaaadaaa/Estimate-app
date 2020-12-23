<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PDFController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $estimate_id = $request->input('estimate');
        $estimate = Estimate::find($estimate_id);
        $estimated_at = $estimate->estimated_at;
        $items = Item::where('estimate_id', $estimate_id)->orderBy('id')->get();
        $item_price = Item::where('estimate_id', $estimate_id)->get(['quantity', 'unit_price']);
        $sum_price = 0;

        if($user->id != $estimate->user_id) {
            return redirect()->route('estimates.index');
        }

        for($i=0; $i<count($item_price); $i++){
            $calculation_price = $item_price[$i]['quantity'] * $item_price[$i]['unit_price'];
            $sum_price += $calculation_price;
        }

    	$pdf = PDF::loadView('pdf/generate_pdf', [
            'user' =>$user,
            'estimate' => $estimate,
            'estimated_at' => date('Y年m月d日', strtotime($estimated_at)),
            'items' => $items,
            'sum_price' => $sum_price,
        ]);

        return $pdf->stream();
    }
}
