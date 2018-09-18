<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;
use app\DotaUser;
use Carbon\Carbon;
header("Content-Type:text/html;charset=utf-8");
class DotaUserController extends Controller
{
	
	
	
    /**
	*Display a listing of the resource
    *
    *@return Response
    *
    */

	public function index()
	{	

		$dotauser = new \App\DotaUser();
		
		$dotausers = $dotauser->get();//查询出来的是json数据  中文会显示乱码  循环时$v->字段名		
		// echo '<pre>';
		// print_r($dotausers);
		// exit;
		return view('dota.lists',compact('dotausers'));
	}
	
	

	
	/**
	*
	*Show the form for creating a new resource
	*
	*
	*@return 
	*/
	public function show()
	{
		echo 'show';
	}


	public function create()
	{
		echo 'create';
	}




}
?>