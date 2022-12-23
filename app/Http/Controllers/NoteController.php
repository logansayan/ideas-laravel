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

    // STORE NOTE TO DATABASE
    public function store(Request $request) {
        $formFields = $request->validate([
            "title" => "",
            "body" => ""
        ]);

        if (!$formFields["title"] == "" && !$formFields["body"] == "") {
            Note::create($formFields);
            return redirect("/")->with("message", $formFields["body"] . "added!");
        } else {
            return redirect(route("notes.add"))->with("message", "You must provide atleast one of the fields");
        }
    }

}
