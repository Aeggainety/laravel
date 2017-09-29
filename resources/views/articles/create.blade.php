@extends('demo')
@section('transfer')
    <h1>撰写新文章</h1>
    <form method='POST' action='store'>
    	标题：<input type='text' name='title' placeholder='请输入标题'><br><br>
    	简介：<input type='text' name='intro' placeholder='请输入简介'><br><br>
    	内容：<textarea rows="3" cols="20"  name='content' placeholder='正文'></textarea><br><br>
    	<input type='submit'>
    </form>
@endsection