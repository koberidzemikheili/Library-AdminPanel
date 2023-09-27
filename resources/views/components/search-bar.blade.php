<div class="flex items-center">
    <form method="GET" action="{{ route('books.index') }}">
        <div class="flex items-center">
            <input type="text" name="query" placeholder="Search..."
                class="rounded-l-md px-4 py-2 border-t border-b border-l text-gray-800 border-gray-300 bg-white"
                value="{{ request('query') }}">
            <button type="submit"
                class="rounded-r-md px-4 py-2 bg-blue-500 text-gray-100 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Search
            </button>
        </div>
    </form>

</div>
