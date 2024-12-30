@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
        <h2 class="text-2xl font-semibold text-center mb-6">Edit Book</h2>

        <!-- Form to Edit Book -->
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter book title" required>
            </div>

            <!-- Author -->
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-medium">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter author name" required>
            </div>

            <!-- Publication Date -->
            <div class="mb-4">
                <label for="pub_date" class="block text-gray-700 font-medium">Publication Date</label>
                <input type="date" name="pub_date" id="pub_date" 
                value="{{ old('pub_date', $book->pub_date ? date('Y-m-d', strtotime($book->pub_date)) : '') }}" 
                class="mt-1 block w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-7000">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@stop
