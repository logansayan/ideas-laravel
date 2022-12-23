<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // SHOW INDEX PAGE
    public function index(Note $note) {
        return view("notes.index", [
            "notes" => $note::latest()->get()
        ]);
    }

    // SHOW SINGLE NOTE PAGE
    public function show(Note $note) {
        return view("notes.show", [
            "note" => $note
        ]);
    }

    // SHOW ADD PAGE
    public function add() {
        return view("notes.add");
    }

}
