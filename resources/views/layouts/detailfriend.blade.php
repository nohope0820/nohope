@extends('layouts.app')
@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li><a href="{{ route('home') }}">Bạn bè</a></li>
			<li><a href="{{ route('findfriend') }}">Tìm bạn bè</a></li>
			<li><a href="{{ route('listroom') }}">Phòng</a></li>
			<li><a href="{{ route('createRoom') }}">Tạo phòng</a></li>
			<li><a href="{{ route('findfriend') }}">Tìm phòng</a></li>
			<li><a href="{{ route('profile') }}">Trang cá nhân</a></li>
			<li><a href="{{ route('friendRequest') }}">Lời mời kết bạn</a></li>
		</ul>
	</div>
	<div class="main">
		@foreach ($query as $rows)
		<div class="avt">
			<img src="{{ asset('view/img/avt.jpg') }}">
			<div class="name">{{ $rows->name }}</div>
			<div class="button">
				
				@if ($check == 1)
				<a href="{{ url('unfriend/'.$rows->id) }}"><button style="background-color: blue; color: white">Bạn bè</button></a>
				@elseif ($record1 == 0)
				<a href="{{ url('addfriend/'.$rows->id) }}"><button>Thêm bạn bè</button></a>
				@elseif ($record1 == 1)
				<a href="{{ url('unfriend/'.$rows->id) }}"><button>Đã gửi lời mời kết bạn</button></a>
				@else
				@endif
				<a href="{{ url('message/'.$rows->id) }}"><button><i class="fa fa-comments"></i>Nhắn tin</button></a>
			</div>
		</div>
		<hr>
		<div class="information">
			<ul>
				<li><i class="fa fa-map-marker"></i> {{ $rows->address }}</li>
				<li><i class="fa fa-venus-mars"></i> {{ $rows->gender }}</li>
				<li><i class="fa fa-graduation-cap"></i> {{ $rows->graduate }}</li>
			</ul>
		</div>
		@endforeach
	</div>
</div>
<style>
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
.content > .main > .avt{margin-top: 70px;
                margin-left: 280px;
                }
.main > .avt > img{width: 190px;border: 4px solid; border-radius: 50%;}             
.main > .avt > .name
{margin-top: 15px; font-size: 30px; font-weight: bold;}
.main > .avt > .button{margin-top: 18px;}
.main > .avt > .button > button
{padding: 8px 20px 8px 20px;
 background-color: #0000FF;
 color: white;
 font-weight: bold;
 border: 1px solid #0000FF;
 margin-left: 55px;
}
.main > hr{margin-top: 15px; height: 2px; background: black;}
.main > .information > ul
{
	margin: 0px;
	padding: 0px;
	list-style: none;
	margin-left: 80px;
	margin-top: 20px;
}
.main > .information > ul > li
{
	padding-top: 20px;
}

</style>
@endsection