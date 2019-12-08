<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KatprodukModel;
use App\ProdukModel;
/**
* 
*/
class HomeController extends Controller
{
	function view() {
		$bestseller = ProdukModel::where('bestseller',1)->take(6)->get();
		foreach ($bestseller as $key => $value) {
			$lower = strtolower($value->nama_produk);
			$arr = explode(' ', $lower);
			$value->alias = implode('_', $arr);
		}
		$newproduct = ProdukModel::where('newproduct',1)->take(4)->get();
		$content = view('center.home',['bestseller'=>$bestseller]);
		return view('page',['content'=>$content]);
	}
}

?>