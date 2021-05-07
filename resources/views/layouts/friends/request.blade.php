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
		<div class="title">Danh sách lời mời kết bạn</div>
		<div class="list">
			    <ul>		
		
				   @foreach ($invitation as $rows)
				      <li><a href="{{ url('/loi-moi-ket-ban/'.$rows->id) }}"><img style="width: 35px; border-radius: 50%; vertical-align: middle;margin-right: 15px;" src="{{ asset('view/img/avt.jpg') }}">{{ $rows->name }}</a></li>
                      <a href="{{ url('/xac-nhan-yeu-cau/'.$rows->id) }}"><button style="background-color: blue; color: white">Chấp nhận</button></a>
					  <a href="{{ url('/huy-yeu-cau/'.$rows->id) }}"><button>Xóa bỏ</button></a>	 
				   @endforeach		    			    	
			    </ul>
		</div>
	</div>
</div>


@endsection
