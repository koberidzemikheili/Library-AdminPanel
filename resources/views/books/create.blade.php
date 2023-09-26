@extends('layouts.app')

@section('content')
    <div class="bg-slate-900 text-white py-10">
        <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Add Book</h1>

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 text-gray-900">
                </div>

                <div class="mb-4">
                    <label for="year" class="block text-gray-700">Year:</label>
                    <input type="text" name="year" id="year" value="{{ old('year') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 text-gray-900">
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Availability:</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 text-gray-900">
                        <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Available</option>
                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="authors" class="block text-gray-700">Authors (Separated by comma):</label>
                    <input type="text" name="authors" id="authors" value="{{ old('authors') }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 text-gray-900">
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue active:bg-blue-700">
                        Add Book
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
