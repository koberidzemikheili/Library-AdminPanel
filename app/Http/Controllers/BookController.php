<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
{
    $query = $request->input('query');

    $books = Book::with('authors')
        ->when($query, function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('query') . '%')
                    ->orWhereHas('authors', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->input('query') . '%');
                    });
            });
        })
        ->get();

    return view('books.index', compact('books'));
}


    public function create()
{
    return view('books.create');
}


    public function store(BookStoreRequest $request)
{
    $validated = $request->validated();
    $book = Book::create($validated);

    $authorNames = explode(',', $request->input('authors'));

    foreach ($authorNames as $authorName) {
        $author = Author::firstOrCreate(['name' => trim($authorName)]);
        $book->authors()->attach($author->id);
    }

    return redirect()->route('books.index');
}


    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }


    public function update(BookUpdateRequest $request, Book $book)
    {
        $validated = $request->validated();
        $book->update($validated);
    
        $authorNames = explode(',', $request->input('authors'));
    
        $book->authors()->detach();
    
        $newAuthorIds = [];
    
        foreach ($authorNames as $authorName) {
            $author = Author::firstOrCreate(['name' => trim($authorName)]);
            $newAuthorIds[] = $author->id;
    
            $book->authors()->attach($author->id);
        }
        Author::doesntHave('books')->delete();
    
        return redirect()->route('books.index');
    }
    
    

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
