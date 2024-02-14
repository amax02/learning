@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Tambah Details Materi</h6>

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
            <form action="/materis" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="ijudul" class="control-label">Judul</label>
                        <input id="ijudul" type="text" name="judul" class="form-control" required="" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="islug" class="control-label">Slug</label>
                        <input id="islug" type="text" name="slug" class="form-control" required="" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div class="col-md-4 mb-2">
                        <!-- Jika perlu, tambahkan elemen untuk memilih tipe -->
                        <label for="itype" class="control-label">Kategori</label>
                        <select id="itype" name="kategori" class="form-control" required>
                            <option value="header" selected>Respirator</option>
                            <option value="promo">promotor</option>
                        </select>
                    </div>
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
                        <textarea name="text" id="itext" class="form-control ckeditor" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="col-md-2 mb-2">
                    <label for="iis_active" class="control-label">Status</label>
                    <select name="is_active" id="iis_active" class="form-control">
                        <option value="1">Aktif</option>
                        <option value="0">Draft</option>
                    </select>
                </div>

                <div class="form-group form-actions">
                    <div class="col-xs-12 text-right">
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary btn-submit">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>







            </form>
        </div>
    </div>
</div>


@endsection