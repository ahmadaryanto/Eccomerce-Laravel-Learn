<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\PageModel;
use Illuminate\Support\Facades\DB;

use Validator;
/**
* 
*/
class PageController extends Controller
{
	function view(Request $request) {
		$content = view('center.page.view');
		return view('index', ['content'=>$content]);
	}

	function data(Request $request) {
		$filter = $request->input('filter');
		$valuefilter = $request->input('valuefilter');
		$jumdata = $request->input('jumlahdata');

		$data = PageModel::select('*');
		
		if ($filter != "") {
			$data = $data->where($filter,'LIKE','%'.$valuefilter.'%');
		}
		$data = $data->paginate($jumdata);

		return View::make('center.page.data',['data'=>$data]);
	}
//add tb_menu
	function add(Request $request) {
		$content = view('center.page.add');
		return view('index', ['content'=>$content]);
	}


	function insert(Request $request) {
		$rules = [
			'nama_page' => 'required|unique:tb_page,nama_page',
			'title' => 'required'
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
		
		$obj = new PageModel;
		$obj->nama_page = $request->input('nama_page');
		$obj->title = $request->input('title');
		$obj->descript = $request->input('descript');
		
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
		$dataPage = PageModel::find($id);
		$content = view('center.page.edit',['dataPage' => $dataPage]);
		return view('index', ['content'=>$content]);
	}

	function update(Request $request) {
		$rules = [
			'nama_page' => 'required|unique:tb_page,nama_page',
			'title' => 'required'
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
		$obj = PageModel::find($request->input('id'));
		$obj->nama_page = $request->input('nama_page');
		$obj->title = $request->input('title');
		$obj->descript = $request->input('descript');
		
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
		$obj = PageModel::find($request->input('id'));
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