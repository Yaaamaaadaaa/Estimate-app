<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showEditForm() 
    {
        $auth = Auth::user();

        return view('auth/edit',[
            'auth' => $auth,
        ]);
    }

    public function edit(Request $request)
    {
        $current_user = Auth::user();

        $current_user->name = $request->name;
        $current_user->postal_code = $request->postal_code;
        $current_user->address = $request->address;
        $current_user->address2 = $request->address2;
        $current_user->company = $request->company;
        $current_user->phone_number = $request->phone_number;
        $current_user->fax_number = $request->fax_number;
        
        $current_user->save();
        return redirect()->route('estimates.index');
    }
}
