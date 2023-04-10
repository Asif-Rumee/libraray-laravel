<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Add Book</title>
</head>
<body>
    <div class="container bg-secondary p-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Book Add</h3>
        <form action="{{ route('book_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <label for="library">Library</label>
                    <br/>
                    <select name="library" id="library">
                    <option value="">Select</option>
                    <option value="central_library">Central Library</option>
                    <option value="departmental_library">Departmental Library</option>
                    </select><br/>
                    @error('library') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="department">Department</label>
                    <br/>
                    <select name="department" id="department">
                    <option value="">Select</option>
                    <option value="cse">CSE</option>
                    <option value="ece">ECE</option>
                    <option value="urp">URP</option>
                    </select><br/>
                    @error('department') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="language">Language</label>
                    <br/>
                    <select name="language" id="language">
                    <option value="">Select</option>
                    <option value="english">English</option>
                    <option value="bengali">Bengali</option>
                    <option value="hindi">Hindi</option>
                    </select><br/>
                    @error('language') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="book_type">Book Type</label>
                    <br/>
                    <select name="book_type" id="book_type">
                    <option value="">Select</option>
                    <option value="classics">Classics</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="horror">Horror</option>
                    </select><br/>
                    @error('book_type') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label for="book_title">Book Title</label><br/>
                    <input type="text" id="book_title" name="book_title"><br/>
                    @error('book_title') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="isbn">ISBN</label><br/>
                    <input type="text" id="isbn" name="isbn"><br/>
                    @error('isbn') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="authors">Authors</label>
                    <br/>
                    <select name="authors" id="authors">
                    <option value="">Select</option>
                    <option value="Asif">Asif</option>
                    <option value="Rahman">Rahman</option>
                    <option value="Rumee">Rumee</option>
                    </select><br/>
                    @error('authors') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="publisher">Publisher</label>
                    <br/>
                    <select name="publisher" id="publisher">
                    <option value="">Select</option>
                    <option value="IEEE">IEEE</option>
                    <option value="Elsevier">Elsevier</option>
                    <option value="Springer">Springer</option>
                    </select><br/>
                    @error('publisher') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label for="publish_date">Publish Date</label><br/>
                    <input type="date" id="publish_date" name="publish_date"><br/>
                    @error('publish_date') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="version">Version</label><br/>
                    <input type="text" id="version" name="version"><br/>
                    @error('version') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="page_no">No. of page</label><br/>
                    <input type="text" id="page_no" name="page_no"><br/>
                    @error('page_no') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="image">Image</label><br/>
                    <input type="file" id="image" name="image"><br/>
                    @error('image') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label for="category">Category</label>
                    <br/>
                    <select name="category" id="category">
                    <option value="">Select</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Thriller">Thriller</option>
                    </select><br/>
                    @error('category') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="quantity">Quantity</label><br/>
                    <input type="number" id="quantity" name="quantity"><br/>
                    @error('quantity') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="price">Price</label><br/>
                    <input type="number" id="price" name="price"><br/>
                    @error('price') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="condition">Condition</label>
                    <br/>
                    <select name="condition" id="condition">
                    <option value="new">New</option>
                    <option value="old">Old</option>
                    <option value="used">Used</option>
                    <option value="unused">Unused</option><br/>
                    </select>
                    @error('condition') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <label for="location">Location</label><br/>
                    <input type="text" id="location" name="location"><br/>
                    @error('location') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="supplier">Supplier</label>
                    <br/>
                    <select name="supplier" id="supplier">
                    <option value="">Select</option>
                    <option value="The Book Worm">The Book Worm</option>
                    <option value="The British Council">The British Council</option>
                    <option value="The University Press">The University Press</option>
                    </select><br/>
                    @error('supplier') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="received_date">Date received</label><br/>
                    <input type="date" id="received_date" name="received_date"><br/>
                    @error('received_date') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
                <div class="col-sm-3">
                    <label for="ebook">E-Book</label><br/>
                    <input type="file" id="ebook" name="ebook"><br/>
                    @error('ebook') <span class='text-danger'> {{$message}} </span> @enderror
                </div>
            </div>
            <div class="row p-3">
                <label for="description">Description</label><br/>
                <textarea id="description" name="description"></textarea><br/>
                @error('description') <span class='text-danger'> {{$message}} </span> @enderror
            </div>
            <div class="row">
                <div class="col-sm-3 ms-auto">
                    <input type="submit" value="Add/Update">
                </div>
            </div>
        </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>