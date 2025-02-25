<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteController extends Controller
{
   public function index(){
    $userId = Auth::user->id;

    return view('notes.index');
   }
}
