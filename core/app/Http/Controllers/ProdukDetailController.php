<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KatprodukModel;
use App\ProdukModel;
/**
* 
*/
class ProdukDetailController extends Controller
{
	function view(Request $request, $alias, $kode_produk) {
		$detail = ProdukModel::where('kode_produk',$kode_produk)->first();
	}
}

?>