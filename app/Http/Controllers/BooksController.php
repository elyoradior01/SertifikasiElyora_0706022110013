<?php

namespace App\Http\Controllers;
use App\Models\BooksModel;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BooksModel::query();

    // Apply search filter
    if ($request->has('search') && $request->filled('search')) {
        $query->where('title', 'LIKE', '%' . $request->search . '%');
    }

    $books = $query->get();

    return view('books.index', [
        'books' => $books,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the request
         $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pub_date' => 'required|date'
        ]);
   
        // Create the book
        $book = BooksModel::create([
            'title' => $request->title,
            'author' => $request->author,
            'pub_date' => $request->pub_date,
        ]);

   
        // Redirect with success message
        return redirect()->route('books.index')->with('success', 'Book added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = BooksModel::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = BooksModel::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pub_date' => 'required|date',
        ]);

        // Update only the fields that are provided
        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = BooksModel::findOrFail($id); // Find the book by ID or throw a 404 error
        $book->delete(); // Delete the book record
   
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');

    }
}
