<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use App\Services\AnswerService;
use App\Http\Requests\CreateAnswerRequest;

class AnswerController extends Controller
{
    
    public function store(CreateAnswerRequest $request, AnswerService $sv)
    {
        $a = $sv->createAnswer(
            Form::findByHash($request->input('form_hash')),
            [
                'email' => $request->input('email')
            ]
        );

        return redirect()
            ->route('quiz', [$a->form->link_hash, "ans" => $a->hash])
            ->with(['answer' => $a]);

    }


}
