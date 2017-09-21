@extends('demo')
@section('transfer')
<hr>
	<ul>
		<!-- 原样输出 -->
		<!-- <li>{{$title}}</li> -->
		<!-- 渲染输出 -->
		<li>{!!$title!!}</li>
		<!-- 传递多个变量 -->
		<li>{{$intro}}</li>
	</ul>

<!-- 模板中的if判断 begin-->
	@if($first == 'wrx')
		{{$first}}
	@else
		{{$last}}
	@endif
<!-- 模板中的if判断 end-->
<br>
<!-- 模板中的unless判断 begin-->
	@unless($first == 'wrx')
		{{$first}}
	@else
		{{$last}}
	@endunless
<!-- 模板中的unless判断 end-->
<br>
<!-- 模板中的foreach begin-->
数组

<div class='table-a'>
<table width="400" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>序号</td>
		<td>标题</td>
		<!-- <td>简介</td>
		<td>内容</td> -->
	</tr>
	@foreach($articles as $v)
	<tr>
		<td><a href="{{action('ArticleController@show',[$v->id])}}">{{$v->id}}</a></td>
		<td><a href="{{action('ArticleController@show',[$v->id])}}">{{$v->title}}</a></td>
		<!-- <td>{{$v->intro}}</td>
		<td>{{$v->content}}</td> -->
	</tr>
	@endforeach
</table>
</div>

	
		
		
		
	
	
 <!-- 模板中的foreach end -->

<hr>
@endsection