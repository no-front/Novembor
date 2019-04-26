@extends('backoffice.main.main')
@section('title', 'Back Office')
@section('content')

	<style type="text/css">
		#block-main-menu-2{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col mb-md-5">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>ข้อมูลการสั่งซื้อ</b>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อผู้ใช้</th>
							<th>รายการสั่งซื้อ</th>
							<th>เวลา</th>
							<th>เบอร์โทร</th>
							<th>ที่อยู่จัดส่ง</th>
							<th>ราคา</th>
						</tr>
						@if(count($orders) > 0)
							@foreach($orders as $key => $value)
								<tr class="tr pointer" onclick="window.location.href='viewnotification/{{ $value->firebaseID }}'">
									<td align="center">{{ $key+1 }}</td>
									<td>{{ $value->cookie }}</td>
									<td>
										@foreach($value->detail as $key2 => $value2)
											<div>- {{ $value2->name }}</div>
										@endforeach
									</td>
									<td align="center">{{ $value->created_at }}</td>
									<td align="center">{{ $value->phone }}</td>
									<td>{{ $value->locationName }}</td>
									<td align="center">{{ $value->totalPrice }} บาท</td>
								</tr>
							@endforeach
						@endif
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection