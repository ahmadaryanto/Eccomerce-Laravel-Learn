<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\UserModel;
use Illuminate\Support\Facades\DB;

use Validator;
/**
* 
*/
class UserController extends Controller
{
	function view(Request $request) {
		$content = view('center.user.view');
		return view('index', ['content'=>$content]);
	}

	function data(Request $request) {
		$filter = $request->input('filter');
		$valuefilter = $request->input('valuefilter');
		$jumdata = $request->input('jumlahdata');

		$data = UserModel::select('*');
		
		if ($filter != "") {
			$data = $data->where($filter,'LIKE','%'.$valuefilter.'%');
		}
		$data = $data->paginate($jumdata);

		return View::make('center.user.data',['data'=>$data]);
	}
//add tb_menu
	function add(Request $request) {
		$content = view('center.user.add');
		return view('index', ['content'=>$content]);
	}


	function insert(Request $request) {
		$rules = [
			'username' => 'required|unique:tb_user,username',
			'password' => 'required',
			'nama'	=> 'required'
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
		$obj = new UserModel;
		$obj->username = $request->input('username');
		$obj->nama = $request->input('nama');
		$obj->is_dev = $request->input('is_dev');
		$obj->password = bcrypt($request->input('password'));

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
		$datauser = UserModel::find($id);
		$content = view('center.user.edit',['datauser' => $datauser]);
		return view('index', ['content'=>$content]);
	}

	function update(Request $request) {

		$rules = [
			'nama'	=> 'required'
		];
		$messages = [
			'required' => ':attribute silakan diisi.'
		];

		$validator = Validator::make($request->input(), $rules, $messages);
		//dd($validator->errors());
		if ($validator->fails()) {
			return $validator->errors();
		}

		$obj = UserModel::find($request->input('id'));
		//$obj->username = $request->input('username');
		$obj->nama = $request->input('nama');
		$obj->is_dev = $request->input('is_dev');
		if ($request->input('password') != "") {
			$obj->password = bcrypt($request->input('password'));
		}
		
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
		$obj = UserModel::find($request->input('id'));
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