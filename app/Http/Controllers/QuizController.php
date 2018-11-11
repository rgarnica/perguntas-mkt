<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    
    public function index(Request $request, string $hashValue)
    {
        $form = Form::findByHash($hashValue);
        return view('quiz', ['form' => $form]);
    }


}
