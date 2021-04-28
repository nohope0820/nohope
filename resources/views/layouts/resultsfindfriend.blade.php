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
		<div class="title">Kết quả tìm kiếm</div>
		<div class="list">
			    <ul>
					@foreach ($query as $rows)
					<li><img src="{{ asset('view/img/avt.jpg') }}"> <a href="{{ url('/detail-friend/'.$rows->id) }}">{{ $rows->name }}</a> 
			    		{{-- <button>Bạn bè</button> --}}
			    	</li>	
					@endforeach
	
			    </ul>
		</div>
	</div>
</div>
@endsection