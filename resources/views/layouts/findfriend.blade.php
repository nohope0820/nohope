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
		<div class="title">Nhập thông tin bạn bè</div>
		<div class="find">
			<form method="POST" action="{{ route('searchfriend') }}">
				@csrf
			   <input type="text" name="find" placeholder="nhập thông tin cần tìm kiếm">
			   <input type="submit" value="Tìm kiếm">
			</form>
		</div>
	</div>
</div>
@endsection