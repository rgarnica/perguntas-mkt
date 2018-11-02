<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Alternative;
use App\Services\AlternativeService;

class AlternativeController extends Controller
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
    public function store(Request $request, AlternativeService $sv)
    {

        $a = $sv->createDefaultAlternative($request->input('question_id'));

        return view('partials.edit-alternative')->with(['alternative' => $a]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternative  $formQuestionAlternative
     * @return \Illuminate\Http\Response
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternative $alternative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternative  $Alternative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternative $alternative)
    {
        $alternative->title = $request->input('value');
        $alternative->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternative $alternative)
    {
        $form = $alternative->question->form;
        $alternative->delete();
        return redirect(route('forms.edit', [$form]));
    }
}
