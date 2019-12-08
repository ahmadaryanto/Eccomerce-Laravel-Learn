<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class AboutusController extends Controller
{
	function view(Request $request) {
		$content = view('center.aboutus.view');
		return view('index', ['content'=>$content]);
	}
}