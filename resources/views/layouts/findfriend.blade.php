@extends('layouts.app')
@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li><a href="{{ route('home') }}">Bạn bè</a></li>
			<li><a href="{{ route('findfriend') }}">Tìm bạn bè</a></li>
			<li><a href="{{ route('findfriend') }}">Tạo phòng</a></li>
			<li><a href="{{ route('findfriend') }}">Tìm phòng</a></li>
			<li><a href="{{ route('findfriend') }}">Trang cá nhân</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="title">Nhập thông tin bạn bè</div>
		<div class="find">
			   <input type="text" name="find" placeholder="nhập thông tin cần tìm kiếm">
			   <button>Tìm kiếm</button>
		</div>
	</div>
</div>
@endsection