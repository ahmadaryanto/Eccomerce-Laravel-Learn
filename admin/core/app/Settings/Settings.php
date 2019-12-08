<?php
namespace App\Settings;

use App\GroupMenuModel;
use App\MenuModel;
/**
* 
*/
class Settings
{
	static function getGroupMenu() {
		return GroupMenuModel::orderBy('id','asc')->get();
	} 

	static function getMenu() {
		return MenuModel::orderBy('urutan','asc')->get();
	}
}

?>