<?php
namespace App\Helper;

use Illuminate\Database\Eloquent\Helper;
use App\Models\Exception;

class Exceptions
{
	public static function exception($ex)
	{
		$data = ([
				'error' => substr($ex,1,500),
				'created_at' => date('Y-m-d H:i:s')
			]);
		$create = Exception::insert($data);
		Session::flash('error', substr($ex->getMessage(),1,500));
	}
}

?>
