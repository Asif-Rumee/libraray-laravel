<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Book Search</title>
</head>
<body>
    <div class="container mx-auto w-50 mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="" method="get">
            <input type="text" class='rounded' placeholder="Search by Book No/Title" name="search" value="{{$search}}">
            <button type="submit">search</button>
        </form>
        
        @if($book != null)
        @if($book->quantity >0)
            <div class="text-success"> Check Availability: {{$book->quantity}} books available</div>
            <form method="POST">
                @csrf
                <input type="hidden" id="book_id" name="book_id" value="{{$book->id}}">
                <input type="hidden" id="quantity" name="quantity" value="{{$book->quantity}}">

                <label for="user_id">User ID*</label><br/>
                <input type="text" id="user_id" name="user_id"><br/>
                @error('user_id') <span class='text-danger'> {{$message}} </span> @enderror <br/>

                <label for="name">Name</label><br/>
                <input type="text" id="name" name="name"><br/>
                @error('name') <span class='text-danger'> {{$message}} </span> @enderror <br/>

                <label for="issue_date">Issue Date*</label><br/>
                <input type="date" id="issue_date" name="issue_date"><br/>
                @error('issue_date') <span class='text-danger'> {{$message}} </span> @enderror <br/>

                <label for="due_date">Due Date*</label><br/>
                <input type="date" id="due_date" name="due_date"><br/>
                @error('due_date') <span class='text-danger'> {{$message}} </span> @enderror <br/>

                <input type="submit" value="Issue">
            </form>
        @endif
        @endif
        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>