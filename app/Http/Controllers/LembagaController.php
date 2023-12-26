<?php

namespace App\Http\Controllers;
use App\Models\Lembaga;
use App\Http\Requests\StoreLembagaRequest;
use App\Http\Requests\UpdateLembagaRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LembagaController extends Controller
{
    /**
     * Instantiate a new LembagaController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-lembaga|edit-lembaga|delete-lembaga', ['only' => ['index','show']]);
        $this->middleware('permission:create-lembaga', ['only' => ['create','store']]);
        $this->middleware('permission:edit-lembaga', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-lembaga', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('lembaga.index', [
            'lembaga' => Lembaga::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('lembaga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLembagaRequest $request): RedirectResponse
    {
        Lembaga::create($request->all());
        return redirect()->route('lembaga.index')
            ->withSuccess('New lembaga is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembaga $lembaga): View
    {
        return view('lembaga.show', [
            'lembaga' => $lembaga
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lembaga $lembaga): View
    {
        return view('lembaga.edit', [
            'lembaga' => $lembaga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLembagaRequest $request, Lembaga $lembaga): RedirectResponse
    {
        $lembaga->update($request->all());
        return redirect()->back()
            ->withSuccess('Lembaga is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembaga $lembaga): RedirectResponse
    {
        $lembaga->delete();
        return redirect()->route('lembaga.index')
            ->withSuccess('Lembaga is deleted successfully.');
    }
}
