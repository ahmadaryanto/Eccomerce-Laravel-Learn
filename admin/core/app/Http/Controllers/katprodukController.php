<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\KatprodukModel;
use Illuminate\Support\Facades\DB;

use Validator;
/**
* 
*/
class katprodukController extends Controller
{
	function view(Request $request) {
		$content = view('center.KategoriProduk.view');
		return view('index', ['content'=>$content]);
	}

	function data(Request $request) {
		$filter = $request->input('filter');
		$valuefilter = $request->input('valuefilter');
		$jumdata = $request->input('jumlahdata');

		$data = KatprodukModel::select('*');
		
		if ($filter != "") {
			$data = $data->where($filter,'LIKE','%'.$valuefilter.'%');
		}
		$data = $data->paginate($jumdata);

		return View::make('center.KategoriProduk.data',['data'=>$data]);
	}
//add tb_menu
	function add(Request $request) {
		$content = view('center.KategoriProduk.add');
		return view('index', ['content'=>$content]);
	}


	function insert(Request $request) {
		$rules = [
			'Urutan' => 'required',
			'Nama_kategori_produk' => 'required|unique:tb_kategori_produk'
		];
		$messages = [
			'required' => ':attribute silakan diisi.',
			'unique' => ':attribute sudah ada.'
		];

		$validator = Validator::make($request->input(), $rules, $messages);
		//dd($validator->errors());
		if ($validator->fails()) {
			return $validator->errors();
		}
		$obj = new KatprodukModel;
		$obj->Urutan = $request->input('Urutan');
		$obj->Nama_kategori_produk = $request->input('Nama_kategori_produk');
		
		$result = "";
		DB::beginTransaction();
		
		try {
			$obj->save();
			DB::commit();
			$result = "berhasil";
		} catch (\Illuminate\Database\QueryException $e) {
			DB::rollback();
			$result = $e->getMessage();
		}
		return $result;
	}

	function edit(Request $request, $id) {
		$datakatproduk = KatprodukModel::find($id);
		$content = view('center.KategoriProduk.edit',['datakatproduk' => $datakatproduk]);
		return view('index', ['content'=>$content]);
	}

	function update(Request $request) {
		$rules = [
			'Urutan' => 'required',
			'Nama_kategori_produk' => 'required|unique:tb_kategori_produk'
		];
		$messages = [
			'required' => ':attribute silakan diisi.',
			'unique' => ':attribute sudah ada.'
		];

		$validator = Validator::make($request->input(), $rules, $messages);
		//dd($validator->errors());
		if ($validator->fails()) {
			return $validator->errors();
		}
		$obj = KatprodukModel::find($request->input('id'));
		$obj->Urutan = $request->input('Urutan');
		$obj->Nama_kategori_produk = $request->input('Nama_kategori_produk');
		
		$result = "";
		DB::beginTransaction();
		try {
			$obj->save();
			DB::commit();
			$result = "berhasil";
		} catch (\Illuminate\Database\QueryException $e) {
			DB::rollback();
			$result = $e->getMessage();
		}
		return $result;
	}

	function delete(Request $request) {
		$obj = KatprodukModel::find($request->input('id'));
		$result = "";
		DB::beginTransaction();
		try {
			$obj->delete();
			DB::commit();
			$result = "berhasil";
		} catch (\Illuminate\Database\QueryException $e) {
			DB::rollback();
			$result = $e->getMessage();
		}
		return $result;
	}
}

?>