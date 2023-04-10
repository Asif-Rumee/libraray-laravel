<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Book List</title>
</head>
<body>
    <div class='container'>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class='row mt-3'>
            <div class='col-sm-9 float-start'>
                <h3>Book List</h3>
            </div>
            <div class='col-sm-3 d-flex justify-content-end'>
                <a href="{{ route('book_add') }}" class='btn border'>+ Add Book</a>
            </div>
        </div>    
        <div class='row'>
            <div class='d-flex justify-content-end my-3'>
                <form action="" method="get">
                    <input type="text" class='rounded' placeholder="Search.." name="search" value="{{$search}}">
                    <button type="submit">search</button>
                </form>
            </div>
        </div>
        <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                <th>Image</th>
                <th>Book No.</th>
                <th>Title</th>
                <th>Authors</th>
                <th>ISBN</th>
                <th>Edition</th>
                <th>Quantity</th>
                <th>Availability</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>
                        <img src="{{ asset('uploads/books/'.$book->image) }}" width="100px" alt="image" >
                    </td>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->authors }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->version }}</td>
                    <td>{{ $book->quantity }}</td>
                    @if($book->quantity <1) <td>unavailable</td>
                    @else <td>available</td>
                    @endif
                    <td>
                        <a href="{{ route('edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('delete', $book->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>