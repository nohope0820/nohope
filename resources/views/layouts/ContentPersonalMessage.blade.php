@extends('layouts.app')
@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li><a href="{{ route('home') }}">Bạn bè</a></li>
			{{-- <li><a href="{{ route('findfriend') }}">Tìm bạn bè</a></li> --}}
			<li><a href="{{ route('listroom') }}">Phòng</a></li>
			<li><a href="{{ route('createRoom') }}">Tạo phòng</a></li>
			{{-- <li><a href="{{ route('findfriend') }}">Tìm phòng</a></li> --}}
			<li><a href="{{ route('profile') }}">Trang cá nhân</a></li>
			<li><a href="{{ route('friendRequest') }}">Lời mời kết bạn</a></li>
		</ul>
	</div>
	<div class="main" style="height:700px;">
		<div class="title">
			@foreach ($query as $rows)
				{{ $rows->name }}
			@endforeach
		</div>
		<hr>
		<div class="form" style="width: 800px; height: 500px; overflow: auto;">
			@php
				$customer_id = request()->route('id');
				$id = Auth::id();
			@endphp
			@foreach ($message as $rows)
			  @if ($id == $rows->my_id)
			  <div style="text-align: right;padding: 5px 10px; background: rgb(229, 229, 240); margin: 20px; border-radius: 10px;" >{{ $rows->messages }}</div>  
			  @else
			  <div style="text-align: left;padding: 5px 10px; background: blue; margin: 20px; border-radius: 10px;" >{{ $rows->messages }}</div>
			  @endif
			@endforeach
	

			<div style="position: absolute;
			bottom: -70px; margin-left:180px;">
			@php
				$customer_id = request()->route('id');
			@endphp
			<form method="POST" action="{{ url('messagePost/'.$customer_id) }}">
				@csrf
			<i class="fa fa-plus-circle"></i> 
			<i class="fa fa-picture-o "></i>
			 <input type="text" name="message" placeholder="Aa">
			 <input type="submit" value="send">
			</form>
			</div>
		</div>
	</div>
</div>
@endsection