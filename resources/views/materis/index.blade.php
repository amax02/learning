@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Details Materi</h6>
            <a href="/materis/create" class="btn btn-primary float-end">Add</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <style>
                    .table thead th,
                    .table tbody td {
                        text-align: center;
                    }
                </style>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">Slug</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materis as $materi)
                        <tr>
                            <td>{{ $materi->judul}}</td>
                            <td>{{ $materi->slug}}</td>
                            <td>{{ $materi->kategori}}</td>
                            <td>
                                <img src="{{ $materi->gambar }}" alt="Gambar">
                            </td>
                            <td class="action-buttons d-flex justify-content-center">
                                <a href="/materis/{{ $materi->id }}/edit" class="btn btn-primary me-1">Edit</a>
                                <form action="/materis/{{$materi->id}}" method="post" class="me-1">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection