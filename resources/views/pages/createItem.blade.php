@extends('layouts.app')

@section('content')
<div class="panel-group mx-5 w-75">
<div class="panel panel-default">
    <div class="panel-heading">Create Item</div>
    <div class="panel-body">
        <form action="{{ url('/items') }}" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Harga per bulan</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="detail" class="form-label">Detail Info</label>
                <input type="text" name="detail_info" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="desc" class="form-label">Deskripsi tambahan</label>
                <input type="text" name="deskripsi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location" class="form-label">Lokasi</label>
                <input type="url" name="lokasi" class="form-control" required>
            </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Item</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection