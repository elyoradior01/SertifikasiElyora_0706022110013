@extends('layouts.app')


@section('content')

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
    <form action="{{ route('members.store') }} " method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
    </div>
    <div class="mb-3">
        <label for="notelp" class="form-label">Telpon</label>
        <input type="number" class="form-control" name="notelp" id="notelp" value="{{ old('notelp') }}">
        @error('notelp')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="px-5 py-2.5 bg-blue-700 text-white font-medium rounded-lg hover:bg-blue-800 focus:outline-none">Submit</button>
    </form>


</div>


@stop



