<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\MenuModel;
use Illuminate\Support\Facades\DB;
/**
* 
*/
class MenuController extends Controller
{
	function view(Request $request) {
		$content = view('center.menu.view');
		return view('index', ['content'=>$content]);
	}

	function data(Request $request) {
		$filter = $request->input('filter');
		$valuefilter = $request->input('valuefilter');
		$jumdata = $request->input('jumlahdata');

		$data = MenuModel::select('tb_menu.*','tb_grupmenu.namagrupmenu')
							->join('tb_grupmenu','tb_grupmenu.id','=','tb_menu.idgrupmenu');

		if ($filter != "") {
			$data = $data->where($filter,'LIKE','%'.$valuefilter.'%');
		}
		$data = $data->paginate($jumdata);
		
		return View::make('center.menu.data',['data'=>$data]);
	}

	function add(Request $request) {
		$grupmenu = DB::table('tb_grupmenu')->select('id','namagrupmenu')->get();
		$content = view('center.menu.add',['grupmenu'=>$grupmenu]);
		return view('index', ['content'=>$content]);
	}

	function insert(Request $request) {
		$obj = new MenuModel;
		$obj->menu = $request->input('menu');
		$obj->nama_menu = $request->input('nama_menu');
		$obj->idgrupmenu = $request->input('idgrupmenu');
		$obj->tampilkan = $request->input('tampilkan');
		$obj->urutan = $request->input('urutan');

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
		$datamenu = MenuModel::find($id);
		$grupmenu = DB::table('tb_grupmenu')->select('id','namagrupmenu')->get();
		$content = view('center.menu.edit',['grupmenu'=>$grupmenu,'datamenu' => $datamenu]);
		return view('index', ['content'=>$content]);
	}

	function update(Request $request) {
		$obj = MenuModel::find($request->input('id'));
		$obj->menu = $request->input('menu');
		$obj->nama_menu = $request->input('nama_menu');
		$obj->idgrupmenu = $request->input('idgrupmenu');
		$obj->tampilkan = $request->input('tampilkan');
		$obj->urutan = $request->input('urutan');
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
		$obj = MenuModel::find($request->input('id'));
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