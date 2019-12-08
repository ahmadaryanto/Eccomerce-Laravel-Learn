<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KatprodukModel;
use App\ProdukModel;
/**
* 
*/
class CartController extends Controller
{
	function add(Request $request, $kode_produk) {
		dump(session_id());
		if (isset($_SESSION['cart'])) {
			array_push($_SESSION['cart'], $kode_produk);
		} else {
			$_SESSION['cart'] = [$kode_produk];
		}
		dd($_SESSION['cart']);
	}
}

?>