@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
    <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight">Edit Borrow Record</h1>
    <form action="{{ route('pinjam.update', $pinjam->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Since it's an update request -->
        
        <div class="mb-4">
            <label for="member_id" class="block text-sm font-medium">Member</label>
            <select name="member_id" id="member_id" class="block w-full mt-2 p-2 border rounded">
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ $pinjam->member_id == $member->id ? 'selected' : '' }}>{{ $member->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="book_id" class="block text-sm font-medium">Book</label>
            <select name="book_id" id="book_id" class="block w-full mt-2 p-2 border rounded">
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $pinjam->book_id == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="borrow_date" class="block text-sm font-medium">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="block w-full mt-2 p-2 border rounded" value="{{ $pinjam->borrow_date }}">
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="block w-full mt-2 p-2 border rounded" value="{{ $pinjam->due_date }}" readonly>
        </div>

        <div class="mb-4">
            <label for="returned_at" class="block text-sm font-medium">Returned Date</label>
            <input type="date" name="returned_at" id="returned_at" class="block w-full mt-2 p-2 border rounded" value="{{ $pinjam->returned_at }}">
        </div>

        <button type="submit" class="px-5 py-2.5 bg-blue-700 text-white font-medium rounded-lg hover:bg-blue-800">Save Changes</button>
    </form>
</div>
@stop
