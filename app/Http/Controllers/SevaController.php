<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSevaRequest;
use App\Http\Requests\UpdateSevaRequest;
use App\Models\Seva;
use App\Services\SevaService;
use Illuminate\Http\Request;

class SevaController extends Controller
{
    protected SevaService $service;

    public function __construct(SevaService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $sevas = Seva::query()

            ->when($request->search, function ($query) use ($request) {

                $query->where('seva_code', 'like', "%{$request->search}%")
                      ->orWhere('seva_name', 'like', "%{$request->search}%")
                      ->orWhere('category', 'like', "%{$request->search}%");

            })

            ->orderBy('seva_name')

            ->paginate(15);

        return view('sevas.index', compact('sevas'));
    }

    public function create()
    {
        $next = Seva::count() + 1;

        $sevaCode = sprintf('SEVA-%03d', $next);

        return view('sevas.create', compact('sevaCode'));
    }

    public function store(StoreSevaRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('sevas.index')
            ->with('success', 'Seva created successfully.');
    }

    public function show(Seva $seva)
    {
        return view('sevas.show', compact('seva'));
    }

    public function edit(Seva $seva)
    {
        return view('sevas.edit', compact('seva'));
    }

    public function update(UpdateSevaRequest $request, Seva $seva)
    {
        $this->service->update($seva, $request->validated());

        return redirect()
            ->route('sevas.index')
            ->with('success', 'Seva updated successfully.');
    }

    public function destroy(Seva $seva)
    {
        $this->service->delete($seva);

        return redirect()
            ->route('sevas.index')
            ->with('success', 'Seva deleted successfully.');
    }
}