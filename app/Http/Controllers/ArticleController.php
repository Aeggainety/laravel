<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;
use app\Article;
header("Content-Type:text/html;charset=utf-8");
class ArticleController extends Controller
{
	
	
	
    /**
	*Display a listing of the resource
    *
    *@return Response
    *
    */

	public function index()
	{	
		// $title = '<span style="color: red">with</span>方法向页面传参';
		//article文件夹名.lists文件名
		// with方法向页面传参
		// return view('articles.lists')->with('title',$title);

		// 用view方法直接向页面传参
		// $title = '用<span style="color: red">view</span>方法直接向页面传参';
		// $intro = '传递多个变量';
		// return view('articles.lists',[
		// 	'title'=>$title,
		// 	'introduction'=>$intro
		// 	]);

		// 用compact方法向页面传参
		$title = '用<span style="color: red">compact</span>方法向页面传参';
		$intro = '传递多个变量';
		$first = 'wrx';
		$last = 'bool';
		$arr = array(1,2,3,4);

		$article = new \App\Article();
		$articles = $article->all();//查询出来的是json数据  中文会显示乱码  循环时$v->字段名
		// $articles = $article->all()->toArray();
		$article->where('id','=','2')->update(['content'=>'文章']);
		$article->title = '二';
		$article->intro = '二';
		$article->content = '二';
		// $article->save();
		// $article->find(id)->delete();
		

		return view('articles.lists',compact('title','intro','first','last','arr','articles'));

	}
	
	
	public function show($id)
	{
		$article = new \App\Article();
		// $res = $article->find($id);
		// if(!$res){
		// 	abort(404);
		// }
		$res = $article->findOrFail($id);
		
		return view('articles.show',compact('res'));
	}
	
	


	/**
	*
	*Show the form for creating a new resource
	*
	*@param	int	$id
	*
	*@return Response
	*/
	public function edit($id)
	{

	}


}
?>