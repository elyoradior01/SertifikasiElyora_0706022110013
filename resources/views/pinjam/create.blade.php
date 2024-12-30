@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-12">
    <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight">Add New Borrow</h1>
    <form action="{{ route('pinjam.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="member_id" class="block text-sm font-medium">Member</label>
            <select name="member_id" id="member_id" class="block w-full mt-2 p-2 border rounded">
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="book_id" class="block text-sm font-medium">Book</label>
            <select name="book_id" id="book_id" class="block w-full mt-2 p-2 border rounded">
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="borrow_date" class="block text-sm font-medium">Borrow Date</label>
            <input type="date" name="borrow_date" id="borrow_date" class="block w-full mt-2 p-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="block w-full mt-2 p-2 border rounded" readonly>
        </div>
        <button type="submit" class="px-5 py-2.5 bg-blue-700 text-white font-medium rounded-lg hover:bg-blue-800">Save</button>
    </form>
</div>

<script>
// JavaScript to automatically set due date when borrow date is selected
document.getElementById('borrow_date').addEventListener('change', function() {
    var borrowDate = new Date(this.value); // Get the selected borrow date
    borrowDate.setDate(borrowDate.getDate() + 7); // Add 7 days to the borrow date

    // Format the due date as YYYY-MM-DD
    var dueDate = borrowDate.toISOString().split('T')[0];

    // Set the due date value
    document.getElementById('due_date').value = dueDate;
});
</script>
@stop
