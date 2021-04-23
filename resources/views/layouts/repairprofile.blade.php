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
		<div class="avt">
			<img src="{{ asset('view/img/avt.jpg') }}">
			<div class="name">{{ Auth::user()->name }}</div>
		</div>
		<hr>
		<div class="information">
			<ul>
				<form method="POST" action="{{ route('updateprofile') }}">
					@csrf
				<li><input type="text" name="address" placeholder="{{ Auth::user()->address }}"></li>
				<li><input type="text" name="gender" placeholder="{{ Auth::user()->gender }}"></li>
				<li><input type="text" name="graduate" placeholder="{{ Auth::user()->graduate }}"></li>
				<input type="submit" value="Chỉnh sửa">
			    </form>
			</ul>
		</div>
	</div>
</div>
@endsection