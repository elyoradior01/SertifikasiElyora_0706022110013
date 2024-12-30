@extends('layouts.app')


@section('content')
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
            Edit Member
        </h1>


        <!-- Form untuk update member -->
        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menambahkan metode PUT untuk update -->


            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $member->nama) }}"
                class="block w-full mt-2 p-2 border rounded" required>
            </div>




            <div class="mb-4">
                <label for="notelp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone
                    Number</label>
                <input type="text" name="notelp" id="notelp"
                    value="{{ old('notelp', $member->notelp) }}" class="block w-full mt-2 p-2 border rounded" required
                    maxlength="12">
       
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="text" name="email" id="email" 
                value="{{ old('email', $member->email) }}" class="block w-full mt-2 p-2 border rounded" required>

            </div>

            <button type="submit"
                class="px-5 py-2.5 bg-blue-700 text-white font-medium rounded-lg hover:bg-blue-800">
                Update Member
            </button>
        </form>
    </div>

@stop






