<div class="custom-block bg-white shadow-lg">
    <a href="{{url('course/'.@$id)}}">
        <div class="d-flex">
            <div>
                <h5 class="mb-2">{{$kategori ?? ''}}</h5>
                <p class="mb-0">{{$nama ?? ''}}</p>
            </div>
        </div>

        <img src="{{asset("storage/".@$gambar)}}" class="custom-block-image img-fluid rounded" alt="">
    </a>
</div>