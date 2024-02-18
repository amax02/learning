@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Data Materi</h6>

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
            <form action="/materis/{{ $materi->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Judul </label>
                    <input name="judul" type="text" class="form-control" id="name" aria-describedby="name" value="{{ $materi->judul }}">

                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input name="slug" type="text" class="form-control" id="slug" aria-describedby="slug" value="{{ $materi->slug }}">

                    <div class="col-md-4 mb-2">
                        <!-- Jika perlu, tambahkan elemen untuk memilih tipe -->
                        <label for="itype" class="control-label">Kategori</label>
                        <select id="itype" name="kategori" class="form-control" required value="{{ $materi->kategori }}">
                            <option value=" header" selected>Respirator</option>
                            <option value="promo">promotor</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="igambar" class="control-label">Gambar</label>
                            <input id="igambar" type="file" name="gambar" accept=".jpg, .jpeg" class="form-control" required="" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-md-1 mb-2">
                            <img id="img-igambar" src="" alt="" class="img-fluid rounded">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="itext" class="control-label">Text</label>
                            <!-- Ganti textarea dengan editor CKEditor -->
                            <textarea name="text" id="itext" class="form-control ckeditor" cols="30" rows="10" value="">{{ $materi->text }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label for="iis_active" class="control-label">Status</label>
                        <select name="is_active" id="iis_active" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Draft</option>
                        </select>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection