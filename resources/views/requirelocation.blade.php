@extends('layout.header')
@section('title', 'ระบุตำแหน่ง - Novemnbor')
@section('content')

<div class="container mh-100 bg-white bg-shadow pb-md-5">
	<div class="row justify-content-center">
		<div class="col-lg-6 col-sm-8 col-10 mt-lg-5 mt-sm-5 mt-4 shadow-lg font-weight-bold p-3 mb-5 bg-white rounded text-title pt-lg-4" align="center">
			<b>ระบุตำแหน่งในการจัดส่ง</b>
			<div class="mt-lg-5 mt-sm-4 mt-4 ml-lg-4 mr-lg-4 ml-sm-4 mr-sm-4 ml-2 mr-2">
				<a href="{{ URL('marklocation') }}" class="btn btn-danger w-100">ใช้ที่อยู่ปัจจุบัน</a>
			</div>
			<div class="mt-lg-4 mt-sm-3 mt-3 ml-lg-4 mr-lg-4 ml-sm-4 mr-sm-4 ml-2 mr-2">
				<a href="{{ URL('marklocation') }}" class="btn btn-black w-100">ดูแผนที่</a>
			</div>
			<div class="mt-lg-5 mt-sm-5 mt-5 mb-lg-4 mb-md-3 mb-3 ml-lg-4 mr-lg-4 ml-sm-4 mr-sm-4 ml-2 mr-2">
				<a href="{{ url()->previous() }}" class="btn btn-default w-100">ยกเลิก</a>
			</div>
		</div>
	</div>
</div>
@endsection