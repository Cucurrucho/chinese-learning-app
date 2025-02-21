<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Inertia\Inertia;

class WordController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response {
        $words = Word::all();
        return Inertia::render('Word/Main', ['words' => $words]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response {
        return Inertia::render('Word/Create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordRequest $request) {
        $request->store();
        return redirect()->route('words.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word) {
        return Inertia::render('Word/Create', ['word' => $word, 'isUpdating' => true]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word) {
        $request->update();
        return redirect()->route('words.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word) {
        $word->delete();
        return redirect()->route('words.index');
    }
}
