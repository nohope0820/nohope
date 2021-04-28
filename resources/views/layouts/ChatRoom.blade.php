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
		<div class="title">{{ $rows->name }}
			<button><i class="fa fa-plus"></i> Thêm bạn bè</button></div>
		<hr>
		<div class="find">
			<i class="fa fa-plus-circle"></i> 
			   <i class="fa fa-picture-o "></i>
			    <input type="text" name="find" placeholder="Aa">
			   <button><i class="fa fa-paper-plane"></i> Gửi</button>
		</div>
		@endforeach
	</div>
</div>
@endsection