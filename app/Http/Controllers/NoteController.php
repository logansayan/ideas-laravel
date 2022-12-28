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
            return redirect("/")
                ->with("message", "\"" . $formFields["body"] . "\" was added!")
                ->with("bgColor", "var(--success)");
        } else {
            return redirect(route("notes.add"))
                ->with("message", "You must provide atleast one of the fields")
                ->with("bgColor", "var(--warning)");
        }
    }

    // DELETE NOTE
    public function delete(Note $note) {
        $title = $note->title;
        $note->delete();
        return redirect("/")
            ->with("message", "\"" . $title . "\" was deleted successfully!")
            ->with("bgColor", "var(--danger)");
    }

    // SHOW EDIT NOTE
    public function edit(Note $note) {
        return view("notes.edit", ["note" => $note]);
    }

    public function update(Note $note, Request $request) {
        $formFields = $request->validate([
            "title" => "",
            "body" => ""
        ]);

        $note->update($formFields);

        return redirect("/")
            ->with("message", "Saved changes!")
            ->with("bgColor", "var(--success)");
    }

}
