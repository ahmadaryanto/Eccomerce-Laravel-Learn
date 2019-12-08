<?php
namespace App\Settings;

use App\KatprodukModel;

/**
* 
*/
class Settings
{
	static function getKatproduk() {
		return KatprodukModel::orderBy('id','asc')->get();
	}

	static function getSetting() {
		//return 
	}
}

?>