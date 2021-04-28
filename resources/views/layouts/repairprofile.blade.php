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
		<div class="avt">
			<img src="{{ asset('view/img/avt.jpg') }}">
			<div class="name">{{ Auth::user()->name }}</div>
		</div>
		<hr>
		<div class="information">
			<ul>
				<form method="POST" action="{{ route('updateprofile') }}">
					@csrf
				<li>Địa chỉ : <input type="text" name="address" placeholder="{{ Auth::user()->address }}" style="margin-left:37px;"></li>
				<li>Giới tính : &nbsp; <input type="text" name="gender" placeholder="{{ Auth::user()->gender }}" style="margin-left:22px;"></li>
				<li>Tốt nghiệp : &nbsp;<input type="text" name="graduate" placeholder="{{ Auth::user()->graduate }}" style="margin-left:10px;"></li>
				<input type="submit" value="Chỉnh sửa" style="margin-left:90px;">
			    </form>
			</ul>
		</div>
	</div>
</div>
@endsection