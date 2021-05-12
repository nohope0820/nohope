@extends('layouts.app')

@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li><a href="{{ route('home.index') }}">Bạn bè</a></li>
			<li><a href="{{ route('find-user.index') }}">Tìm bạn bè</a></li>
			<li><a href="{{ route('room.show') }}">Phòng</a></li>
			<li><a href="{{ url('/tao-phong') }}">Tạo phòng</a></li>
			<li><a href="{{ route('find-user.index') }}">Tìm phòng</a></li>
			<li><a href="{{ route('profile.index') }}">Trang cá nhân</a></li>
			<li><a href="{{ url('/loi-moi-ket-ban') }}">Lời mời kết bạn</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="title">Danh sách phòng</div>
		<div class="list">
            <ul>
                @foreach ($rooms as $rows)
                <li style="width: 500px;"><a href="{{ url('room='.$rows->id )}}"><span>{{ $rows->name }}</span></a></li>    
                @endforeach
            </ul>
		</div>
	</div>
</div>
<style>
body{background-color: #66FFFF; }
.content{display: flex;
margin-left: 120px;}
.content > .content-left{width: 275px;
	                    background: white;
	                    height: 600px;
	                  margin-top: 30px;
	                  border-radius: 50px 0 0 0;}
.content-left > .menu{
	margin: 0px;
	padding: 0px;
	list-style: none;
	margin-top: 60px;
}
.content-left > .menu > li{
	padding: 15px;
	padding-left: 30px;
}
.menu > li > a{
	color: black;
	text-decoration: none;
}
.content-left > .menu > li:hover{
	border: 2px solid #660000;
	font-weight: bold;
	background: linear-gradient( to right, white, white,white, green);
}
.content > .main{width: 800px;
	                    background: white;
	                    height: 600px;
	                  margin-top: 30px;
	                  margin-left: 50px;
	                  border-radius:  0 50px 0 0;}
.content > .main > .title{margin-top: 50px;
                margin-left: 50px;
                font-size: 25px;
                text-decoration: underline;}
.main > .list > ul{ margin: 0px;
                    padding: 0px;
                    list-style: none;
                    margin-left: 70px;
                    margin-top: 30px;
                    width: 500px; }
.list > ul > li{
	padding: 15px;
	padding-left: 30px;
	width: 500px;
}


.list > ul > li > a{text-decoration: none; }
.list > ul > li > a > span{ color: black; font-size: 20px}
.list > ul > li:hover{background-color: #CCCCCC;
                      border-radius:10px;}
.list > ul > li > a:hover{ color: green; text-decoration: underline; }
.list > ul > li > div{margin-top: 7px; font-size: 11px;}
</style>

@endsection
