@extends('layout.header')
@section('title', 'สั่งอาหารเรียบร้อย - Novemnbor')
@section('content')

<style type="text/css">
    #dropdownListMenu {
        display: none;
    }
</style>

<div class="container mh-100 bg-shadow pb-md-5 bg-white">
    <div class="row mb-md-3 mb-lg-3 mb-3" align="center">
        <div class="col mt-lg-5 mt-sm-4 mt-4 font-weight-bold text-title">
            <b>สั่งอาหารเรียบร้อย</b>
        </div>
    </div>
    <div align="center">เราจะส่งถึงมือคุณภายใน 20 นาที</div>
    <div align="center">ขอบคุณค่ะ</div>
    <div class="row">
        <div class="col-4 col-md-2 offset-md-5 offset-4 mt-md-3 mt-3 mb-md-2 mb-2">
            <a href="{{ URL('/') }}" class="btn btn-danger w-100">ปิด</a>
        </div>
    </div>
</div>

<script src="{{ URL('js/novembor/successorder.js') }}"></script>


@endsection