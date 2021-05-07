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
		<div class="title">Thêm thành viên</div>
		<div class="find">			
			   <input type="text" name="addmemberroom"  placeholder="nhập thông tin cần tìm kiếm">
			   <input type="submit" value="Tìm kiếm">
		</div>
	</div>
</div>
@endsection