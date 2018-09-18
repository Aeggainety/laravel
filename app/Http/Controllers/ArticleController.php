<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;
use app\Article;
use Carbon\Carbon;
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
		// $articles = $article->orderBy('id','ASC')->get();//查询出来的是json数据  中文会显示乱码  循环时$v->字段名
		// $articles = $article->latest()->get();//查询出来的是json数据  中文会显示乱码  循环时$v->字段名
		$articles = $article->where('publish_at','<=',Carbon::now())->latest()->get();//查询出来的是json数据  中文会显示乱码  循环时$v->字段名
		// $articles = $article->all()->toArray();
		$article->where('id','=','2')->update(['content'=>'文章']);
		$article->title = '二';
		$article->intro = '二';
		$article->content = '二';
		// 时间字段类型timestamp自动生成时间
		
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
	*
	*@return 
	*/
	public function create()
	{
		return view('articles.create');
	}


	//接受/处理提交信息页面
	public function store()
	{

		$article = new \App\Article();
		
		// var_dump($_POST);
		/* 必填  将表单信息提交到数据库
		*  标题
		*  简介
		*  内容
		*  发布时间
		*/
		$article->title = $_POST['title'];
		$article->intro = $_POST['intro'];
		$article->content = $_POST['content'];
		$article->publish_at = $this->setPublishedAtAttribute($_POST['publish_at']);//数据库字段类型timestamp

		// $timeObj = $this->setPublishedAtAttribute($_POST['publish_at']);
		// $timearray = $this->object2array($timeObj);
		// var_dump($timeObj);echo '<hr>';
		// var_dump($timearray);
		// $article->publish_at = $timearray['date'];
		
		// exit;
		$article->save();
		
		return redirect('/');
	}

	//时间设置
	public function setPublishedAtAttribute($date)
	{
		return $this->attributes['publish_at'] = Carbon::createFromFormat('Y-m-d',$date);
	}


	//控制时间查询方法
	public function scopePublished($query)
	{
		return $query->where('publish_at','<=',Carbon::now());
	}

	//对象转换成数组方法
	// function object2array($object) {
	//   if (is_object($object)) {
	//     foreach ($object as $key => $value) {
	//       $array[$key] = $value;
	//     }
	//   }
	//   else {
	//     $array = $object;
	//   }
	//   return $array;
	// }


}
?>