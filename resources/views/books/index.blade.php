@extends('layouts.app')


@section('content')
    <div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Books Data</h1>

            @if (session('success'))
        <div class="alert alert-success" role="alert"> {{ session('success')}} </div>
        @endif

        <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="flex items-center">
            <input type="text" name="search" 
                   class="w-full px-4 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg"
                   placeholder="Search by title" value="{{ request('search') }}">

            <button type="submit" 
                    class="ml-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Search
            </button>
        </div>  
        </form>


        <div class="my-4">
            <a href="{{ route('books.create') }}"
                class="text-yellow-100 bg-orange-600 hover:bg-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 ">
                + Add new book
            </a>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Author</th>
                        <th scope="col" class="px-6 py-3">Published Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->author }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($book->pub_date)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No books found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop





