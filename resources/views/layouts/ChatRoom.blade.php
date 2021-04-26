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