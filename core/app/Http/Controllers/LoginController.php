<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
* 
*/
class LoginController extends Controller
{
	function login(Request $request) {
		return view('login');
	}

	function submitlogin(Request $request) {
		$username = $request->input('username');
		$password = $request->input('password');

		try {
			
		} catch (Exception $e) {
			
		}
		$data = DB::where('groupuser',1)->get();
		echo $username;
	}
}

?>