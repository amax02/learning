@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Video Materi</h6>

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
            <form action="/videos/{{ $video->id }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="id_materis" class="form-label">Materi</label>
                    <select name="id_materis" type="text" class="form-control" id="id_materis" aria-describedby="id_materis">
                        @foreach($materis as $k => $v)
                            <option value="{{ $v['id'] }}" {{ $v['id'] == $video->id_materis ? 'selected' : '' }}>{{ $v['judul'] }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input name="link" type="text" class="form-control" id="link" aria-describedby="link" value="{{ $video->link }}">

                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection