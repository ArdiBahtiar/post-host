@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="width: 18rem">
        <form action="{{ url('/items/search') }}" class="form-group" method="get">
            <div class="form-outline">
              <input type="search" class="form-control" name="cari"/>
            </div>
            <button type="submit" class="btn btn-primary mt-2 mb-5">
                <label class="form-label">Search</label>
            </button>
        </form>
    </div>
    <div class="row">
        @foreach ($datas as $data)
        <div class="col-4 d-flex align-items-stretch">
            <div class="card p-1 m-2">
                <img class="card-img-top" src="{{ asset('images/parkiran.png') }}" alt="Gambar"> 
                <div class="card-body">
                    <h5 class="card-title">{{ $data->nama }}</h5>
                    <p class="card-text">{{ $data->deskripsi }}</p>
                    <p class="card-text">{{ $data->harga }} /bulan</p>
                    <a href="{{ url('items/' . $data->id) }}" class="btn btn-primary">Lihat Postingan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    {{ $datas->links() }}
</div>
@endsection