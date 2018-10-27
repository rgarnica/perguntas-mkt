<?php

namespace App\Http\Controllers;

use App\Form;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Types\FormQuestionTypes;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
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

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = Auth::user()->forms()->create([
            'title' => 'Questionário sem título',
            'description' => 'Descrição do questionário',
            'expires_at' => Carbon::tomorrow()
        ]);
        
        $form->questions()->create([
            'title' => 'Questão...',
            'type' => FormQuestionTypes::OPEN
        ]);

        return redirect()->route('forms.edit', $form->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        return view('forms.edit')->with(['form' => $form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        $form->title = $request->input('title') ?: 'Questionário sem título';
        $form->description = $request->input('description') ?: 'Sem descrição';
        $form->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
