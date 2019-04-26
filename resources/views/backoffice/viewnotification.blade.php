@extends('backoffice.main.main')
@section('title', 'Back Office')
@section('content')

<style type="text/css">
	#block-main-menu-1 {
		background-color: #6E6E6E;
		color: white;
	}
</style>

<div class="row">
	<div class="col">
		<div class="row">
			<div class="col text-title pb-md-4" align="center">
				<b>รายละเอียดออเดอร์</b>
			</div>
		</div>
		<div class="row pl-lg-3 pr-lg-3">
			<div class="col-md-7 col-12 pr-md-2 d-none d-md-block">
				<!-- block list order -->
				<div class="row" id="listMyOrder">
				@if(count($order)>0)
					@foreach($order as $key => $value)
					<div class="col-12">
						<div class="bg-white border-1-ddd mb-md-2 p-2">
							<div class="row">
								<div class="col-md-4">
									<img src="{{ $value->image }}" class="w-100 border-1-ddd"></div>
								<div class="col-md-5 pt-md-2 pl-md-0 pr-md-0 font-md-14">
									{{ $value->name }}
								</div>
								<div class="col-md-3 pt-md-2 pl-md-0 font-md-14" align="right">
									{{ $value->total }} รายการ
								</div>
							</div>
						</div>
					</div>
					@endforeach
				@endif
					
				</div>
			</div>

			<div class="col-md-5 col-12 pl-md-2 font-lg-14">
				<!-- block price order -->
				<div class="bg-white border-1-ddd pt-md-3 pb-md-3 pl-md-3 pr-md-3 pt-3 pb-3 pl-3 pr-3">
					<div class="">
						<b class="">จัดส่งที่ : </b>
						<div class="inline" id="locationName">{{ $order[0]->locationName }}</div>
					</div>
					<div>
						<b class="font-weight-bold">บ้านเลขที่ / ชื่อหอพัก : </b>
						<div class="inline" id="apartmentName">{{ $order[0]->home_apartment }}</div>
					</div>
					<div>
						<b class="font-weight-bold">เบอร์ติดต่อ : </b>
						<div class="inline" id="phoneContact">{{ $order[0]->phone }}</div>
					</div>
				</div>
				<div class="bg-white border-1-ddd pt-md-2 pt-lg-4 pb-md-3 pl-md-3 pr-md-3 pt-3 pb-3 pl-3 pr-3">
					<div class="row">
					@foreach($order as $key => $value)
						<div class="col-md-7 font-lg-16 font-md-14 pr-md-0 pr-md-2 textoverflow" id="countMyOrder">
							{{ $value->name }}
						</div>
						<div class="col-md-5" id="priceMyOrder2" align="right">
							<div class="row">
								<div class="col-3 px-md-0" align="center">
									{{ $value->total }}
								</div>
								<div class="col-9 pl-md-0">
									{{ $value->total * $value->price }}
								</div>
							</div>
						</div>
					@endforeach
					</div>
					<div class="row pt-md-2 pt-2">
						<div class="col-md-6 col-6 font-md-14 pt-md-1 pt-lg-0">
							ค่าจัดส่ง
						</div>
						<div class="col-md-6 col-6 font-md-16" align="right">
							ฟรี
						</div>
						<div class="col-md-12 col-12 pt-md-3 pt-2">
							<div class="border-b-black-1"></div>
						</div>
					</div>
					<div class="row pt-md-3 pt-2 font-lg-16">
						<div class="col-md-6 col-6 font-weight-bold pt-md-1 pt-1 ">
							ยอดรวมทั้งหมด
						</div>
						<div class="col-md-6 col-6 font-weight-bold " id="priceMyOrder" align="right">
							{{ $order[0]->totalPrice }}
						</div>
					</div>
					<div class="row pt-md-5 pt-4">
						<div class="col-md-12 mb-md-3 mb-3">
							<a class="btn btn-danger w-100">
								Print
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col pb-md-2 mt-md-4 font-weight-bold" align="center">
				<b>แผนที่จัดส่ง</b>
			</div>
		</div>
		<div class="row pl-lg-3 pr-lg-3">
			<div class="col-12 mb-md-5">
				<div class="map-backoffice" id="map">

				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="firebaseID" value="{{ $order[0]->firebaseID }}">
<input type="hidden" id="latitude" value="{{ $order[0]->latitude }}">
<input type="hidden" id="longtitude" value="{{ $order[0]->longtitude }}">


<script src="{{ URL('js/backoffice/viewnotification.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC80Dz7LHPgP2CB9BA790xItbWTbJe2tdY&callback=initMap&language=th&region=TH" async defer></script>

@endsection