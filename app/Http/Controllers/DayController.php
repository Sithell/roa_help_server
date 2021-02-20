<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class DayController extends Controller
{
    function show(Request $request, string $date) {
        $date_parts = explode('-', $date);
        $user = User::whereApiToken($request->input("token"))->first();
        if ($user === null) {
            return $this::jsonResponse([], 404, "User not found");
        }
        if (!checkdate($date_parts[1], $date_parts[2], $date_parts[0])){
            return self::jsonResponse([], 400, "Invalid date format");
        }
        $day = Day::where("date", $date)->first();
        if (is_null($day)) {
            return self::jsonResponse([], 404, "Day not found");
        }
        $notes = Note::where("user_id", $user->id)->where("date", $date)->get();
        $day["notes"] = $notes;
        return self::jsonResponse($day);
    }


    function water(Request $request) {
        $date = date('Y-m-d');
        $user = User::whereApiToken($request->input("token"))->first();
        if ($user === null) {
            return $this::jsonResponse([], 404, "User not found");
        }
        $value = $request->input("value");

        $day = Day::where("user_id", $user->id)->where("date", $date)->first();
        if ($day === null) {
            $day = new Day();
            $day->user_id = $user->id;
            $day->date = $date;
        }
        $day->water = $value;
        $day->save();
        return $this::jsonResponse($day);
    }

    function drug(Request $request) {
        $date = date('Y-m-d');
        $user = User::whereApiToken($request->input("token"))->first();
        if ($user === null) {
            return $this::jsonResponse([], 404, "User not found");
        }
        $value = $request->input("fat");

        $day = Day::where("user_id", $user->id)->where("date", $date)->first();
        if ($day === null) {
            $day = new Day();
            $day->user_id = $user->id;
            $day->date = $date;
        }
        if ($day->first_missed) {
            $day->first_fat = $value;
            $day->first_missed = false;
        } else {
            $day->second_fat = $value;
            $day->second_missed = false;
        }
        $day->save();
        return $this::jsonResponse($day);
    }
}
