<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use App\Http\Requests\TecnicoRequest;

/**
 * Class TecnicoController
 * @package App\Http\Controllers
 */
class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = Tecnico::paginate();

        return view('tecnico.index', compact('tecnicos'))
            ->with('i', (request()->input('page', 1) - 1) * $tecnicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tecnico = new Tecnico();
        return view('tecnico.create', compact('tecnico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TecnicoRequest $request)
    {
        Tecnico::create($request->validated());

        return redirect()->route('tecnicos.index')
            ->with('success', 'Tecnico created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tecnico = Tecnico::find($id);

        return view('tecnico.show', compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tecnico = Tecnico::find($id);

        return view('tecnico.edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TecnicoRequest $request, Tecnico $tecnico)
    {
        $tecnico->update($request->validated());

        return redirect()->route('tecnicos.index')
            ->with('success', 'Tecnico updated successfully');
    }

    public function destroy($id)
    {
        Tecnico::find($id)->delete();

        return redirect()->route('tecnicos.index')
            ->with('success', 'Tecnico deleted successfully');
    }
}
