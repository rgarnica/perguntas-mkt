<?php

namespace App\Http\Controllers;

use App\Form;
use App\Answer;
use App\Alternative;
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

    public function store(Request $request)
    {
        $answer = Answer::findByHash($request->input('answer_hash'));
  
        foreach ($request->input('responses') as $response) {

            if (isset($response['alternative_id'])) {

                $alternative = Alternative::find($response['alternative_id']);

                $answer->responses()->attach($response['question_id'], [
                    'response' => $alternative->title,
                    'alternative_id' => $alternative->id
                ]);


            } else {
                $answer->responses()->attach($response['question_id'], [
                    'response' => $response['response']
                ]);
            }
            
        }

        $answer->submited = true;
        $answer->save();

    }


}
