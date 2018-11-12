<?php

namespace App\Http\Controllers;

use App\Form;
use App\Answer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    
    public function index(Request $request, string $hashValue)
    {
        $form = Form::findByHash($hashValue);

        if (null !== $request->input('ans')) {
            $answer = Answer::findByHash($request->input('ans'));
        } else {
            $answer = null;
        }

        return view('quiz', ['form' => $form, 'answer' => $answer]);
    }


}
