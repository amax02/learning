<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <style>
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh; /* Full height of the viewport */
            max-height: 80vh; /* Maximum height */
            width: 230px;
            z-index: 1000;
            background-color: #bebebe; /* Background color */
            padding-top: 20px;
            overflow-y: auto; /* Enable vertical scrolling if content exceeds max-height */
        }

        #sidebar .nav-link {
            color: #495057; /* Text color */
        }

        #sidebar .nav-link.active {
            color: #007bff; /* Active link color */
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <!-- Sidebar content goes here -->
                    <ul class="nav flex-column">
                         @foreach($materis as $m)
                            <li class="nav-item">
                                <a class="nav-link {{$m->judul == @$judul_current ? 'active' : ''}}" href="{{url("list/$m->id")}}">
                                    {{$m->judul}}
                                </a>
                            </li>
                        @endforeach
                       
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Your main content goes here -->
                @if(isset($detail_materis))
                    <h2>{{$detail_materis->judul}}</h2>
                    <div class="d-flex justify-content-between">
                        @if(isset($videos))
                            @foreach($videos as $vid)
                                <iframe width="560" height="315" src="{{ $vid['link'] }}" title="{{$detail_materis->judul}}" 
                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            @endforeach
                        @endisset
                    </div>
                    <p>{{$detail_materis->text}}</p>
                @else
                    <h2>Silakan pilih materi!</h2>
                @endif
            </main>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>