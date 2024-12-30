<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\MembersModel;
use App\Models\BooksModel;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowRecords = PinjamModel::with('member', 'book')->get();
        return view('pinjam.index', compact('borrowRecords'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all members
        $members = MembersModel::all();


        // Get only books that are not currently borrowed
        $books = BooksModel::whereDoesntHave('pinjam', function ($query) {
            $query->whereNull('returned_at'); // Assuming 'returned_at' is null for borrowed books
        })->get();


        return view('pinjam.create', compact('members', 'books'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate incoming request
         $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
        ]);


        // Check if the book is already borrowed
        $isBorrowed = PinjamModel::where('book_id', $request->book_id)
            ->whereNull('returned_at') // Assuming 'returned_at' is null if the book is not returned
            ->exists();


        if ($isBorrowed) {
            return redirect()->back()->withErrors(['book_id' => 'This book is currently borrowed by another member.']);
        }


        // Create a new borrowing record
        PinjamModel::create($validated);


        return redirect()->route('pinjam.index')->with('success', 'Borrow record added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Get the borrow record by its ID
        $pinjam = PinjamModel::findOrFail($id);
        
        // Get all members and available books for selection
        $members = MembersModel::all();
        $books = BooksModel::all();

        return view('pinjam.edit', compact('pinjam', 'members', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'returned_at' => 'nullable|date|after_or_equal:borrow_date', // Validate returned date if present
        ]);

        // Find the borrow record by ID
        $pinjam = PinjamModel::findOrFail($id);

        // Update the record with the validated data
        $pinjam->update($validated);

        return redirect()->route('pinjam.index')->with('success', 'Borrow record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the borrow record by its ID
    $pinjam = PinjamModel::findOrFail($id);

    // Delete the borrow record
    $pinjam->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('pinjam.index')->with('success', 'Borrow record deleted successfully!');
    }
}
