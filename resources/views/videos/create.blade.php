@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Tambah Video Materi</h6>

        </div>
        <div class="card-body px-4 pt-0 pb-2">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/videos" method="post">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Video</label>
                    <input name="judul" type="text" class="form-control" id="judul" aria-describedby="judul">

                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input name="link" type="text" class="form-control" id="link" aria-describedby="link">


                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection