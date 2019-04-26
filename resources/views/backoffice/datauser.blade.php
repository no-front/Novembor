@extends('backoffice.main.main')
@section('title', 'Back Office')
@section('content')

	<style type="text/css">
		#block-main-menu-4{
			background-color: #6E6E6E;
			color: white;
		}
	</style>

	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-title pb-md-3" align="center">
					<b>ข้อมูลผู้ใช้</b>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="tbl-backoffice">
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อผู้ใช้</th>
							<th>เบอร์โทร</th>
							<th>ที่อยู่</th>
							<th>การสั่งซื้อ</th>
						</tr>
						@foreach($users as $key => $value)
							<tr class="tr">
								<td align="center">{{ $key+1 }}</td>
								<td>{{ $value->cookie }}</td>
								<td align="center">{{ $value->phone }}</td>
								<td>247 Suk Sawat 60 เขต ทุ่งครุ, แขวง บางมด</td>
								<td align="center">180 บาท</td>
							</tr>
						@endforeach
						
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection