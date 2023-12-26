<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Http\Requests\StoreFormulirRequest;
use App\Http\Requests\UpdateFormulirRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FormulirController extends Controller
{
    public function index()
    {
        return view('formulir.index', [
            'formulir' => Formulir::latest()->paginate(3)
        ]);
    }
    public function create(): View
    {
        return view('formulir.create');
    }
    public function store(StoreFormulirRequest $request): RedirectResponse
    {
        Formulir::create($request->all());
        return redirect()->route('formulir.index')
            ->withSuccess('Data baru sudah diinput.');
    }
    public function show(Formulir $formulir): View
    {
        return view('formulir.show', [
            'formulir' => $formulir
        ]);
    }
    public function edit(Formulir $formulir): View
    {
        return view('formulir.edit', [
            'formulir' => $formulir
        ]);
    }
    public function update(UpdateFormulirRequest $request, Formulir $formulir): RedirectResponse
    {
        $formulir->update($request->all());
        return redirect()->back()
            ->withSuccess('Formulir sudah diupdate.');
    }
    public function destroy(Formulir $formulir): RedirectResponse
    {
        $formulir->delete();
        return redirect()->route('formulir.index')
            ->withSuccess('Formulir berhasil dihapus');
    }
}
