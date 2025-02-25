<?php

namespace App\Http\Controllers\Notes;

use Illuminate\Http\Request;
use App\Models\Notes\NoteModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
   public function index(){

    $userId = Auth::user()->id;
    $notes = NoteModel::where('user_id', $userId)->get();

    return view('notes.index', compact('notes'));
   }

    public function create(){
        return view('create.index');
    }

   public function store(Request $request)
   {

       $request->validate([
           'notes' => 'required|string|max:255',
       ]);

       // Get the authenticated user's ID
       $userId = Auth::user()->id;

       // Create a new note
       NoteModel::create([
           'user_id' => $userId,
           'notes' => $request->input('notes'),
       ]);

       // Redirect with a success message
       return redirect()->route('notes.index')->with('success', 'Note created successfully!');
   }
}
