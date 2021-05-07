@extends('layouts.app')
@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li><a href="{{ route('home') }}">Bạn bè</a></li>
			{{-- <li><a href="{{ route('findfriend') }}">Tìm bạn bè</a></li> --}}
			<li><a href="{{ route('listroom') }}">Phòng</a></li>
			<li><a href="{{ route('createRoom') }}">Tạo phòng</a></li>
			{{-- <li><a href="{{ route('findfriend') }}">Tìm phòng</a></li> --}}
			<li><a href="{{ route('profile') }}">Trang cá nhân</a></li>
			<li><a href="{{ route('friendRequest') }}">Lời mời kết bạn</a></li>
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