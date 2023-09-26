<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->get();
        return view('books.index', compact('books'));
    }

    public function create()
{
    return view('books.create');
}


    public function store(Request $request)
{
    $book = Book::create([
        'name' => $request->input('name'),
        'year' => $request->input('year'),
        'status' => $request->input('status'),
    ]);

    $authorNames = explode(',', $request->input('authors'));

    foreach ($authorNames as $authorName) {
        $author = Author::firstOrCreate(['name' => trim($authorName)]);
        $book->authors()->attach($author->id);
    }

    return redirect()->route('books.index')->with('success', 'Book added successfully');
}


    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }


    public function update(Request $request, Book $book)
    {
        $book->update([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'status' => $request->input('status'),
        ]);
    
        $authorNames = explode(',', $request->input('authors'));
    
        $book->authors()->detach();
    
        foreach ($authorNames as $authorName) {
            $author = Author::firstOrCreate(['name' => trim($authorName)]);
            $book->authors()->attach($author->id);
        }
    
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }
    

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
