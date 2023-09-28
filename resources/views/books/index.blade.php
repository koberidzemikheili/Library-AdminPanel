@extends('layouts.app')

@section('content')
    <div class="py-10">
        <div class="sm:px-0 md:px-0 lg:px-5 mx-auto flex flex-col">
            <div class="mb-4">
                <h1 class="text-2xl font-semibold">List of Books</h1>
            </div>
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('books.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-gray-100 font-semibold lg:py-2 lg:px-4 rounded-md">Add New
                    Book</a>
                <x-search-bar />
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-800">

                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-800 text-left">Name</th>
                            <th class="px-6 py-3 bg-gray-800 text-left">Author</th>
                            <th class="px-6 py-3 bg-gray-800 text-left">Year</th>
                            <th class="px-6 py-3 bg-gray-800 text-left">Status</th>
                            <th class="px-6 py-3 bg-gray-800 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $book->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($book->authors as $author)
                                        {{ $author->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $book->year }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $book->status == 0 ? 'Unavailable' : 'Available' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap space-x-4">
                                    <a href="{{ route('books.edit', $book) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-gray-100 font-semibold py-2 px-4 rounded-md inline-block">Edit</a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-gray-100 font-semibold py-2 px-4 rounded-md">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
