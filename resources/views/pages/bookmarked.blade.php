{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="width: 18rem">
        <form action="{{ url('/items/search') }}" class="form-group" method="get">
            <div class="form-outline">
              <input type="search" class="form-control" name="cari"/>
            </div>
            <button type="submit" class="btn btn-primary">
                <label class="form-label">Search</label>
            </button>
        </form>
    </div>
    <div class="row">
        @foreach ($items as $item)
            <div class="card p-3 m-2" style="height: 18rem; width: 22rem">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">{{ $item->deskripsi }}</p>
                    <p class="card-text">{{ $item->harga }} /bulan</p>
                    <a href="{{ url('items/' . $item->id) }}" class="btn btn-primary">Lihat Postingan</a>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    {{ $bookmarks->links() }}
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Bookmarked Posts</h1>

        @if($bookmarks->isEmpty())
            <p>You have no bookmarked posts.</p>
        @else
            <div class="row">
                @foreach($bookmarks as $item)
                    <div class="col-4 d-flex align-items-stretch">
                        <div class="card p-1 m-2">
                            <img class="card-img-top" src="{{ asset('images/parkiran.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text">{{ $item->harga }} /bulan</p>
                                <a href="{{ url('items/' . $item->id) }}" class="btn btn-primary">Lihat Postingan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
