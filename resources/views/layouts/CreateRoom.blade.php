@extends('layouts.app')
@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li>Bạn bè</li>
			<li>Tìm bạn bè</li>
			<li>Tạo phòng</li>
			<li>Tìm phòng</li>
			<li>Trang cá nhân</li>
		</ul>
	</div>
	<div class="main">
		<div class="title">Tạo phòng</div>
		<div class="find">
			<form method="POST" action="{{ route('createRoomPost') }}">
				@csrf
			   <input type="text" name="name" placeholder="Nhập tên phòng muốn tạo">
			   <input type="submit" value="Tạo phòng">
			</form>
		</div>
	</div>
</div>
@endsection