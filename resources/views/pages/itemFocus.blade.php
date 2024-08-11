@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Detail Tempat</div>
                <div class="card-body">
                    @if($list)
                    <h5>{{ $list->nama }}</h5>
                    <p>{{ $list->detail_info }}</p>
                    <p>{{ $list->deskripsi }}</p>
                    <p>{{ $list->harga }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">Pemilik Tempat</div>
                <div class="card-body">
                    @if($user)
                    <h5>{{ $user->name }}</h5>
                    <p>{{ $user->email }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('bookmarks.save', $list) }}" method="POST">
                @csrf
                <button type="submit">Bookmark</button>
            </form>
        </div>
        
        <div class="col">
            <form action="{{ route('bookmarks.destroy', $list) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Remove Bookmark</button>
            </form>
        </div>

        <div class="col">
            <form action="{{ route('chat.initiate', $list->id) }}" method="GET">
                @csrf
                <button type="submit">Chat Penjual</button>
            </form>
        </div>
    </div>
</div>
@endsection