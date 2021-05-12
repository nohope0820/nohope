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
		@foreach ($profile as $rows)
		<div class="avt">
			<img src="{{ asset('view/img/avt.jpg') }}">
			<div class="name">{{ $rows->name }}</div>
			<div class="button"><button><a href="{{ route('profile.edit') }}">Chỉnh sửa</a></button></div>
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

@endsection