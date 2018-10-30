<?php

namespace App\Http\Controllers;

use App\Form;
use App\FormQuestion;
use Illuminate\Http\Request;
use App\Types\FormQuestionTypes;

class FormQuestionController extends Controller
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
     * @param  \App\FormQuestion  $question
     * @return \Illuminate\Http\Response
     */
    public function show(FormQuestion $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormQuestion  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(FormQuestion $question)
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
    public function update(Request $request, FormQuestion $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormQuestion  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormQuestion $question)
    {
        $form = $question->form;
        $question->delete();
        return redirect(route('forms.edit', [$form]));
    }
}
