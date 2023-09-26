@extends('layouts.app')

@section('content')
    <h1>Delete Book</h1>

    <p>Are you sure you want to delete "{{ $book->name }}"?</p>

    <form action="{{ route('books.destroy', $book) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
        <a href="{{ route('books.index') }}">Cancel</a>
    </form>
@endsection
