<?php

namespace App\Http\Controllers;

use App\Models\UserRecord;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function puzzleGame()
    {
        return view('word_puzzle');
    }
    public function mathGame()
    {
        return view('math_game');
    }

    public function objectGame()
    {
        return view('object_game');
    }

    public function validateAnswer(Request $request)
    {
        $userAnswers = $request->input('answers');
        $correctAnswers = ["animals", "fruits", "vehicles", "colors", "shapes"];
        $correctCount = 0;
        $results = [];

        foreach ($userAnswers as $index => $answer) {
            if ($answer === $correctAnswers[$index]) {
                $correctCount++;
                $results[] = "Question " . ($index + 1) . ": Correct! Well done!";
            } else {
                $results[] = "Question " . ($index + 1) . ": Sorry, that's incorrect. Please try again.";
            }
        }

        $score = ($correctCount / count($correctAnswers)) * 100;

        return response()->json(['results' => $results, 'score' => number_format($score, 2)]);
    }

    public function askNameAndAge(Request $request)
    {
        $name = $request->input('name');
        $game = $request->input('game');
        $age = $request->input('age');
        $score = $request->input('score');

        $userRecord = new UserRecord();
        $userRecord->name = $name;
        $userRecord->game = $game;
        $userRecord->age = $age;
        $userRecord->score = $score;
        $userRecord->save();

        return response()->json(['message' => 'User record saved successfully']);
    }

    public function saveMathUserInfo(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $score = $request->input('score');

        $userRecord = new UserRecord();
        $userRecord->name = $name;
        $userRecord->age = $age;
        $userRecord->score = $score;
        $userRecord->save();

        return response()->json(['name' => $name, 'age' => $age]);
    }
    public function savePuzzleUserInfo(Request $request)
{
    $name = $request->input('name');
    $age = $request->input('age');
    $score = $request->input('score');

    $userRecord = new UserRecord();
    $userRecord->name = $name;
    $userRecord->age = $age;
    $userRecord->score = $score;
    $userRecord->save();

    return response()->json(['name' => $name, 'age' => $age]);
}

}

  
