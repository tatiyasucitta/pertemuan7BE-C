<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/add.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('add.book.form')}}">Add Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('create.form')}}">Create Author</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('create.cat.form')}}">Create New Category</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <form method="POST" action="{{route('updatebook', ['id' => $buku->id])}}" class="content" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h2>Formulir update</h2>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Judul buku</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="title" value="{{$buku->title}}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Harga buku</span>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price" value="{{$buku->price}}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Stok buku</span>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="stock" value="{{$buku->stock}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Gambar buku</span>
            <input type="file" class="form-control" name="bookpic" value="{{$buku->image}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Author Name</span>
            <select class="form-select" aria-label="Default select example" name="author_id">
                <option selected value={{$buku->author->id}}>{{$buku->author->author_name}}</option>
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->author_name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        @if($errors->any())
            <li class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </li>
        @endif

        <button type="submit" class="btn btn-info">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>