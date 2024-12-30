<?php

namespace App\Http\Controllers;
use App\Models\MembersModel;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = MembersModel::query(); // Initialize a query on your model

        // Check if a search term is provided and filter results
        if ($request->has('search') && $request->filled('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }
    
        // Execute the query and pass the results to the view
        $members = $query->get();
    
        return view('members.index', [
            'members' => $members,
        ]);
    

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'notelp' => 'required|numeric|digits:12|unique:members,notelp',
            'email' => 'required|string|unique:members,email'
            
        ], [
            'notelp.unique' => 'The phone number has already been taken.',
            'notelp.numeric' => 'The phone number must only contain numbers.',
            'email.unique' => 'The email address has already been taken.'
        ]);


        // Membuat member baru
        MembersModel::create([
            'nama' => $request->nama,
            'notelp' => $request->notelp,
            'email' => $request->email,

        ]);


        // Redirect ke halaman lain setelah sukses
        return redirect()->route('members.index')->with('success', 'Member created successfully!');

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
        $member = MembersModel::findOrFail($id);
        return view('members.edit', compact('member'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {

         // Validasi input
         $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'notelp' => 'required|string|max:12|unique:members,notelp,'. $id,
            'email' => 'required|string|unique:members,email,'. $id,
        ], [
            'notelp.unique' => 'The phone number has already been taken.',
            'notelp.numeric' => 'The phone number must only contain numbers.',
            'email.unique' => 'The email address has already been taken.'
        ]);

        // Cari member berdasarkan ID
        $member = MembersModel::findOrFail($id);

        // Update data member
        $member->update($validated);


        // Kembali ke halaman list member dengan pesan sukses
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = MembersModel::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    
    }
}
