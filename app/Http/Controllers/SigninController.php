<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SigninController extends Controller
{
	public function form()
    {
        return view('authStand.login');
    }


    function attempt(Request $request)
	{
		$email = $request->email;
	    $password = $request->password;
	    $user = DB::table('stands')->where('email', $email)->where('password', $password)->first();
        if(isset($user->id)){
            session(['id_stand' => $user->id, 'nama_stand' => $user->name,'tipe' => $user->tipe]);
            return redirect('food');
        }
        
        return Redirect::back()->withErrors(['These credentials do not match our records.', 'The Message']);

	}

}
