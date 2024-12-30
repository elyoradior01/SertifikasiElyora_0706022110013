@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<div class="mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Members Data</h1>

        @if (session('success'))
        <div class="alert alert-success" role="alert"> {{ session('success')}} </div>
        @endif

        <!-- Search Bar -->
    <form method="GET" action="{{ route('members.index') }}" class="mb-4">
        <div class="flex items-center">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search by name..." 
                class="w-full px-4 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg"
            />
            <button 
                type="submit" 
                class="ml-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 ">
                Search
            </button>
        </div>
    </form>


        <div class="my-4">
            <a href="{{ route('members.create') }}"
                class="text-yellow-100 bg-orange-600 hover:bg-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 ">
                + Add new member
            </a>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Member ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $member->id }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $member->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $member->notelp }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $member->email }}
                            </td>
                            <td class="px-6 py-4 flex space-x-4">
                
                                <a href="{{ route('members.edit', $member->id) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition duration-300">Edit</a>


                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this member?');"
                                class="inline">
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





