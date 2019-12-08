<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\ProdukModel;
use Illuminate\Support\Facades\DB;

use Validator;
/**
* 
*/
class produkController extends Controller
{
	function view(Request $request) {
		$content = view('center.produk.view');
		return view('index', ['content'=>$content]);
	}

	function data(Request $request) {
		$filter = $request->input('filter');
		$valuefilter = $request->input('valuefilter');
		$jumdata = $request->input('jumlahdata');

		$data = ProdukModel::select('tb_produk.id','tb_produk.kode_produk','tb_produk.nama_produk','tb_produk.harga','tb_kategori_produk.Nama_kategori_produk')
		->join('tb_kategori_produk','tb_kategori_produk.id','=','tb_produk.id_kategori_produk');
		
		if ($filter != "") {
			$data = $data->where($filter,'LIKE','%'.$valuefilter.'%');
		}
		$data = $data->paginate($jumdata);

		return View::make('center.produk.data',['data'=>$data]);
	}
//add tb_menu
	function add(Request $request) {
		$kategori = DB::table('tb_kategori_produk')->get();
		$attribute = DB::table('tb_attribute')->get();
		$content = view('center.produk.add',['kategori'=>$kategori,'attribute'=>$attribute]);
		return view('index', ['content'=>$content]);
	}


	function insert(Request $request) {
		$rules = [
			'kode_produk' => 'required|unique:tb_produk,kode_produk',
			'nama_produk' => 'required',
			'id_kategori_produk' => 'required',
			'jenis_attribute' => 'required',
			'attribute' => 'required',
			'newproduct' => 'required',
			'bestseller' => 'required',
			'harga' => 'required',
			'diskon' => 'required',
			'berat' => 'required',
			'images' => 'required',
			'simple_desc' => 'required'
		];
		$messages = [
			'required' => ':attribute silakan diisi.',
			'unique' => ':attribute sudah ada.'
		];

		$validator = Validator::make($request->input(), $rules, $messages);
		
		if ($validator->fails()) {
			return $validator->errors();
		}

		$obj = new ProdukModel;
		$obj->kode_produk = $request->input('kode_produk');
		$obj->nama_produk = $request->input('nama_produk');
		$obj->id_kategori_produk = $request->input('id_kategori_produk');
		$obj->jenis_attribute = $request->input('jenis_attribute');
		$obj->attribute = $request->input('attribute');
		$obj->newproduct = $request->input('newproduct');
		$obj->bestseller = $request->input('bestseller');
		$obj->harga = $request->input('harga');
		$obj->diskon = $request->input('diskon');
		$obj->berat = $request->input('berat');
		$obj->images = $request->input('images');
		$obj->images_lain = json_encode($request->input('images_lain'));
		$obj->simple_desc = $request->input('simple_desc');
		$obj->description = $request->input('description');
		
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
		$dataproduk = ProdukModel::find($id);
		$kategori = DB::table('tb_kategori_produk')->get();
		$attribute = DB::table('tb_attribute')->get();
		$content = view('center.produk.edit',['dataproduk' => $dataproduk,'kategori'=>$kategori,'attribute'=>$attribute]);
		return view('index', ['content'=>$content]);
	}

	function update(Request $request) {
		$rules = [
			'nama_produk' => 'required',
			'id_kategori_produk' => 'required',
			'jenis_attribute' => 'required',
			'attribute' => 'required',
			'newproduct' => 'required',
			'bestseller' => 'required',
			'harga' => 'required',
			'diskon' => 'required',
			'berat' => 'required',
			'images' => 'required',
			'simple_desc' => 'required'
		];
		$messages = [
			'required' => ':attribute silakan diisi.',
			'unique' => ':attribute sudah ada.'
		];

		$validator = Validator::make($request->input(), $rules, $messages);
		
		if ($validator->fails()) {
			return $validator->errors();
		}

		$obj = ProdukModel::find($request->input('id'));
		$obj->nama_produk = $request->input('nama_produk');
		$obj->id_kategori_produk = $request->input('id_kategori_produk');
		$obj->jenis_attribute = $request->input('jenis_attribute');
		$obj->attribute = $request->input('attribute');
		$obj->newproduct = $request->input('newproduct');
		$obj->bestseller = $request->input('bestseller');
		$obj->harga = $request->input('harga');
		$obj->diskon = $request->input('diskon');
		$obj->berat = $request->input('berat');
		$obj->images = $request->input('images');
		$obj->images_lain = json_encode($request->input('images_lain'));
		$obj->simple_desc = $request->input('simple_desc');
		$obj->description = $request->input('description');
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
		$obj = ProdukModel::find($request->input('id'));
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