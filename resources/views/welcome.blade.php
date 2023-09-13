<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel S3 Code - Ahmer Naheed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        body,
        .card {
            background: #ededed;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p>{{ Session::get('success') }}</p>
                </div>
                @endif
            </div>
            <div class="col-sm-8">
                @if (count($images) > 0)
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($images as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block w-100" src="{{ $image['src'] }}" alt="First slide">
                            <div class="carousel-caption">
                                <form action="{{ url('images/' . $image['name']) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-default">Remove</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @else
                <p>Nothing found</p>
                @endif
            </div>
            <div class="col-sm-4">
                <div class="card border-0 text-center">
                    <form action="{{ url('/images') }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                    <div class="mt-5 p-5">
                        <h1><a href="https://github.com/ahmer-naheed-247">Ahmer Naheed</a></h1>
                        <p>Will be adding a video tutorial and blog for this code.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>

</html>