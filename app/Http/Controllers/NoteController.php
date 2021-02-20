<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    function create(Request $request) {
        $date = date('Y-m-d');
        $user = User::whereApiToken($request->input("token"))->first();
        if ($user === null) {
            return $this::jsonResponse([], 404, "User not found");
        }
        $value = $request->input("text");

        $note = new Note();
        $note->user_id = $user->id;
        $note->date = $date;
        $note->text = $value;
        $note->save();
        return $this::jsonResponse($note);
    }
}
