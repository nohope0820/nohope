@extends('layouts.app')
@section('content')
<div class="content">
	<div class="content-left">
		<ul class="menu">
			<li>Bạn bè</li>
			<li><a href="">Tìm bạn bè</a></li>
			<li>Tạo phòng</li>
			<li>Tìm phòng</li>
			<li>Trang cá nhân</li>
		</ul>
	</div>
	<div class="main">
		<div class="title">Kết quả tìm kiếm</div>
		<div class="list">
			    <ul>
			    	<li><img src="{{ asset('view/img/avt.jpg') }}"> <a href="">Người dùng 1</a> 
			    		<button>Bạn bè</button>
			    	</li>
			    	<li><img src="{{ asset('view/img/avt.jpg') }}"> Người dùng 2
			    	<button>Bạn bè</button>
			        </li>
			    	<li><img src="{{ asset('view/img/avt.jpg') }}"> Người dùng 3
			    	<button>Thêm bạn bè</button>
			        </li>
			    	<li><img src="{{ asset('view/img/avt.jpg') }}"> Người dùng 4
			    	<button>Thêm bạn bè</button>
			        </li>
			    	<li><img src="{{ asset('view/img/avt.jpg') }}"> Người dùng 5<button>Thêm bạn bè</button>
			        </li>
			    	<li><img src="{{ asset('view/img/avt.jpg') }}"> Người dùng 6<button>Thêm bạn bè</button>
			        </li>
			    	
			    </ul>
		</div>
	</div>
</div>
@endsection