<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Issue;

class BookController extends Controller
{
    public function index(){
        return view('bookAdd');
    }

    public function edit($id){
        $data = Book::findOrFail($id);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'library' => 'required',
            'department' => 'required',
            'language' => 'required',
            'book_type' => 'required',
            'book_title' => 'required',
            'isbn' => 'required',
            'authors' => 'required',
            'publisher' => 'required',
            'publish_date' => 'required',
            'version' => 'required',
            'page_no' =>'required',
            'image' => 'required | file',
            'category' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'location' => 'required',
            'supplier' => 'required',
            'received_date' => 'required',
            'ebook' => 'required | file',
            'description' => 'required',
    ]);
        $book = Book::findOrFail($id);
        $book->library = $request->input('library');
        $book->department = $request->input('department');
        $book->language = $request->input('language');
        $book->book_type = $request->input('book_type');
        $book->book_title = $request->input('book_title');
        $book->isbn = $request->input('isbn');
        $book->authors = $request->input('authors');
        $book->publisher = $request->input('publisher');
        $book->publish_date = $request->input('publish_date');
        $book->version = $request->input('version');
        $book->page_no = $request->input('page_no');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/books/', $filename);
            $book->image = $filename;
        }
        $book->category = $request->input('category');
        $book->quantity = $request->input('quantity');
        $book->price = $request->input('price');
        $book->condition = $request->input('condition');
        $book->location = $request->input('location');
        $book->supplier = $request->input('supplier');
        $book->received_date = $request->input('received_date');
        if($request->hasfile('ebook')){
            $file = $request->file('ebook');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/books/', $filename);
            $book->ebook = $filename;
        }
        $book->description = $request->input('description');
        $book->save();

        return redirect()->route('book_show')->with('success', 'Updated the book successfully!');
    }

    public function delete($id){
        Book::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function search(Request $request){
        $search = $request['search'] ?? '';
        if($search != ''){
            $book = Book::where('id', '=', "$search")
            ->orwhere('book_title', '=', "$search")
            ->first();
        }else{
            $book = null;
        }
        return view('bookSearch', compact('book','search'));
    }

    public function show(Request $request){
        $search = $request['search'] ?? '';
        if($search != ''){
            $books = Book::where('id', 'LIKE', "%$search%")
            ->orwhere('book_title', 'LIKE', "%$search%")
            ->orwhere('authors', 'LIKE', "%$search%")
            ->orwhere('isbn', 'LIKE', "%$search%")
            ->orwhere('version', 'LIKE', "%$search%")
            ->orwhere('quantity', 'LIKE', "%$search%")
            ->get();
        }else{
            $books = Book::all();
        }
        return view('books', compact('books','search'));
    }

    public function issue(Request $request){
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'issue_date' => 'required',
            'due_date' => 'required',
        ]);

        $issue = new Issue();
        $issue->book_id = $request->input('book_id');
        $issue->user_id = $request->input('user_id');
        $issue->name = $request->input('name');
        $issue->issue_date = $request->input('issue_date');
        $issue->due_date = $request->input('due_date');
        $issue->save();
        
        $book = Book::where('id', '=', $request->input('book_id'))->first();
        $book->quantity = $request->input('quantity')-1;
        $book->save();

        return redirect()->route('book_issue')->with('success', 'Book Issued successfully!');
    }

    public function store(Request $request){
        $request->validate([
            'library' => 'required',
            'department' => 'required',
            'language' => 'required',
            'book_type' => 'required',
            'book_title' => 'required',
            'isbn' => 'required',
            'authors' => 'required',
            'publisher' => 'required',
            'publish_date' => 'required',
            'version' => 'required',
            'page_no' =>'required',
            'image' => 'required | file',
            'category' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'location' => 'required',
            'supplier' => 'required',
            'received_date' => 'required',
            'ebook' => 'required | file',
            'description' => 'required',
    ]);

        $book = new Book();
        $book->library = $request->input('library');
        $book->department = $request->input('department');
        $book->language = $request->input('language');
        $book->book_type = $request->input('book_type');
        $book->book_title = $request->input('book_title');
        $book->isbn = $request->input('isbn');
        $book->authors = $request->input('authors');
        $book->publisher = $request->input('publisher');
        $book->publish_date = $request->input('publish_date');
        $book->version = $request->input('version');
        $book->page_no = $request->input('page_no');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/books/', $filename);
            $book->image = $filename;
        }
        $book->category = $request->input('category');
        $book->quantity = $request->input('quantity');
        $book->price = $request->input('price');
        $book->condition = $request->input('condition');
        $book->location = $request->input('location');
        $book->supplier = $request->input('supplier');
        $book->received_date = $request->input('received_date');
        if($request->hasfile('ebook')){
            $file = $request->file('ebook');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/books/', $filename);
            $book->ebook = $filename;
        }
        $book->description = $request->input('description');
        $book->save();

        return redirect()->route('book_add')->with('success', 'Inserted record successfully!');
}

}
