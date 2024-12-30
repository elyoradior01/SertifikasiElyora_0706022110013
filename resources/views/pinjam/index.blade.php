@extends('layouts.app')


@section('content')

    <div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Pinjam Data</h1>

            @if (session('success'))
        <div class="alert alert-success" role="alert"> {{ session('success')}} </div>
        @endif


        <div class="my-4">
            <a href="{{ route('pinjam.create') }}"
                class="text-yellow-100 bg-orange-600 hover:bg-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 ">
                + Add new borrow
            </a>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Member</th>
                        <th scope="col" class="px-6 py-3">Borrowed Book</th>
                        <th scope="col" class="px-6 py-3">Borrow Date</th>
                        <th scope="col" class="px-6 py-3">Due Date</th>
                        <th scope="col" class="px-6 py-3">Returned Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowRecords as $record)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $record->member->nama }}</td>
                            <td class="px-6 py-4">{{ $record->book->title }}</td>
                            <td class="px-6 py-4">{{ $record->borrow_date }}</td>
                            <td class="px-6 py-4">{{ $record->due_date }}</td>
                            <td class="px-4 py-4">{{ $record->returned_at ? $record->returned_at : '-' }} </td>
                            <td class="px-6 py-4 flex space-x-4">
                                <a href="{{ route('pinjam.edit', $record->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('pinjam.destroy', $record->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this borrow record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium hover:underline transition duration-300">Delete</button>
                            </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
@stop





