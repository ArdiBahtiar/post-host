@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="input-group">
            <div class="form-outline" data-mdb-input-init>
              <input id="search-focus" type="search" class="form-control" />
              <label class="form-label" for="form1">Search</label>
            </div>
            <button type="button" class="btn btn-primary" data-mdb-ripple-init>
              <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
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
    <br>
    {{ $datas->links() }}
</div>
@endsection