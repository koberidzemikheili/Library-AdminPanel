<!-- resources/views/books.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>List of Books</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Year</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->authors }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->status }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
