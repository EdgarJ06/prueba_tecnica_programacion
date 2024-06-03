<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Http\Requests\BitacoraRequest;

/**
 * Class BitacoraController
 * @package App\Http\Controllers
 */
class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacoras = Bitacora::paginate();

        return view('bitacora.index', compact('bitacoras'))
            ->with('i', (request()->input('page', 1) - 1) * $bitacoras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bitacora = new Bitacora();
        return view('bitacora.create', compact('bitacora'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BitacoraRequest $request)
    {
        Bitacora::create($request->validated());

        return redirect()->route('bitacoras.index')
            ->with('success', 'Bitacora created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bitacora = Bitacora::find($id);

        return view('bitacora.show', compact('bitacora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bitacora = Bitacora::find($id);

        return view('bitacora.edit', compact('bitacora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BitacoraRequest $request, Bitacora $bitacora)
    {
        $bitacora->update($request->validated());

        return redirect()->route('bitacoras.index')
            ->with('success', 'Bitacora updated successfully');
    }

    public function destroy($id)
    {
        Bitacora::find($id)->delete();

        return redirect()->route('bitacoras.index')
            ->with('success', 'Bitacora deleted successfully');
    }
}
