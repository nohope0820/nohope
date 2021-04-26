@extends('layouts.app')

@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li><a href="{{ route('findfriend') }}">Bạn bè</a></li>
			<li><a href="{{ route('findfriend') }}">Tìm bạn bè</a></li>
			<li><a href="{{ route('listroom') }}">Phòng</a></li>
			<li><a href="{{ route('createRoom') }}">Tạo phòng</a></li>
			<li><a href="{{ route('findfriend') }}">Tìm phòng</a></li>
			<li><a href="{{ route('profile') }}">Trang cá nhân</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="title">Danh sách bạn bè</div>
		<div class="list">
			    <ul>					
				   @foreach ($query as $rows)
				      <li><a href="{{ url('/detail-friend/'.$rows->id) }}"><img style="width: 35px; border-radius: 50%; vertical-align: middle;margin-right: 15px;" src="{{ asset('view/img/avt.jpg') }}">{{ $rows->name }}</a></li>	 
				   @endforeach
			    			    	
			    </ul>
		</div>
	</div>
</div>


@endsection
