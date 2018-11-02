<?php

namespace App\Http\Controllers;

use App\Form;
use App\Question;
use Illuminate\Http\Request;
use App\Types\FormQuestionTypes;
use App\Services\AlternativeService;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $q = Form::find($request->input('form_id'))->questions()->create([
            'title' => 'Questão sem título',
            'type' => FormQuestionTypes::OPEN
        ]);

        return view('partials.edit-question')->with(['question' => $q]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, AlternativeService $sv)
    {
        $field = $request->input('field');
        $value = $request->input('value');
        $question->$field = $value;
        $question->save();

        if ($field === 'type') {

            $value = (int) $value;

            if ($value === FormQuestionTypes::OBJECTIVE) {
                for ($i = 1; $i <= 3; $i ++) {
                    $sv->createDefaultAlternative($question->id);
                }
            } else {
                $question->alternatives()->delete();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $form = $question->form;
        $question->delete();
        return redirect(route('forms.edit', [$form]));
    }
}
