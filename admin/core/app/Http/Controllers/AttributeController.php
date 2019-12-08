<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\AttributeModel;
use Illuminate\Support\Facades\DB;
/**
* 
*/
class AttributeController extends Controller
{
	function view(Request $request) {
		$content = view('center.attribute.view');
		return view('index', ['content'=>$content]);
	}

	function data(Request $request) {
		$filter = $request->input('filter');
		$valuefilter = $request->input('valuefilter');
		$jumdata = $request->input('jumlahdata');

		$data = AttributeModel::select('*');

		if ($filter != "") {
			$data = $data->where($filter,'LIKE','%'.$valuefilter.'%');
		}
		$data = $data->paginate($jumdata);
		
		return View::make('center.attribute.data',['data'=>$data]);
	}

	function add(Request $request) {
		$content = view('center.attribute.add');
		return view('index', ['content'=>$content]);
	}

	function insert(Request $request) {
		$obj = new AttributeModel;
		$obj->nama_attribute = $request->input('nama_attribute');
		$obj->keterangan = $request->input('keterangan');

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
		$dataattribute = AttributeModel::find($id);
		$content = view('center.attribute.edit',['dataattribute' => $dataattribute]);
		return view('index', ['content'=>$content]);
	}

	function update(Request $request) {
		$obj = AttributeModel::find($request->input('id'));
		$obj->nama_attribute = $request->input('nama_attribute');
		$obj->keterangan = $request->input('keterangan');
		//bcrypt($request->input('password'))
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
		$obj = AttributeModel::find($request->input('id'));
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