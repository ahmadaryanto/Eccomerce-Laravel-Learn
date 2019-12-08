<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
* 
*/
class LoginController extends Controller
{
	function login(Request $request) {
		if(Auth::check()) {
			return redirect('index');
		} else {
			return view('login');	
		}
		
	}

	function submitlogin(Request $request) {
		$username = $request->input('username');
		$password = $request->input('password');
		if (Auth::attempt(["username"=>$username,"password"=>$password])) {
			return '1';
		} else {
			return '2';
		}
	}

	function logout(Request $request) {
		Auth::logout();
		return redirect('login');
	}

	function toDashboard(Request $request) {
		$content = view('center.dashboard.view');
		return view('index', ['content'=>$content]);
	}
}

?>