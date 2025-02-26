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
    // dd($userId);
    $notes = NoteModel::where('user_id', $userId)->get();

    return view('notes.index', compact('notes'));
   }

    public function create(){
        return view('notes.create');
    }

   public function store(Request $request)
   {


       $request->validate([
           'note' => 'required|string|max:255',
       ]);
       $userId = Auth::user()->id;

       // Create a new note
       NoteModel::create([
           'user_id' => $userId,
           'notes' => $request->input('note'),
       ]);

       // Redirect with a success message
       return redirect()->route('notes.index')->with('success', 'Note created successfully!');
   }

   public function edit($id){
    $note = NoteModel::find($id);
    return view('notes.edit', compact('note'));
   }

   public function update(Request $request, $id)
{

    $request->validate([
        'note' => 'required|string|max:255',
    ]);

    $note = NoteModel::findOrFail($id);

    if ($note->user_id !== Auth::id()) {
        return redirect()->route('notes.index')->with('error', 'Unauthorized access.');
    }

    $note->update([
        'notes' => $request->input('note'),
    ]);

    return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
}

public function destroy($id)
{
    // dd($id);
    $note = NoteModel::findOrFail($id);
    $note->delete();

    return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
}

}
