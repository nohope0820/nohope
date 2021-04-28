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
			<div class="button"><button><a href="{{ route('repairprofile') }}">Chỉnh sửa</a></button></div>
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