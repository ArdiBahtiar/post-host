@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($datas as $data)
        {{-- <div class="col"> --}}
            <div class="card p-3 m-2" style="height: 18rem; width: 22rem">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->nama }}</h5>
                    <p class="card-text">{{ $data->deskripsi }}</p>
                    <p class="card-text">{{ $data->harga }} /bulan</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        {{-- </div>   --}}
        @endforeach
    </div>
</div>
@endsection