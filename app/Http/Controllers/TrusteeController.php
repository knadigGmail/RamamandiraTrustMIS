<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrusteeRequest;
use App\Http\Requests\UpdateTrusteeRequest;
use App\Models\Trustee;
use App\Services\TrusteeService;

class TrusteeController extends Controller
{
    protected TrusteeService $service;

    public function __construct(TrusteeService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $search = request('search');

    $query = Trustee::query();

    if ($search) {
        $query->where('trustee_code', 'like', "%{$search}%")
              ->orWhere('name', 'like', "%{$search}%")
              ->orWhere('mobile', 'like', "%{$search}%")
              ->orWhere('designation', 'like', "%{$search}%");
    }

    $trustees = $query
        ->orderBy('name')
        ->paginate(10)
        ->withQueryString();

    $totalTrustees = Trustee::count();
    $activeTrustees = Trustee::where('status', 1)->count();
    $inactiveTrustees = Trustee::where('status', 0)->count();

    return view('trustees.index', compact(
        'trustees',
        'search',
        'totalTrustees',
        'activeTrustees',
        'inactiveTrustees'
    ));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trustees.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(StoreTrusteeRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('trustees.index')
            ->with('success', 'Trustee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trustee $trustee)
    {
        return view('trustees.show', compact('trustee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trustee $trustee)
    {
        return view('trustees.edit', compact('trustee'));
    }

    /**
     * Update the specified resource.
     */
    public function update(UpdateTrusteeRequest $request, Trustee $trustee)
    {
        $this->service->update(
            $trustee,
            $request->validated()
        );

        return redirect()
            ->route('trustees.index')
            ->with('success', 'Trustee updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Trustee $trustee)
    {
        $this->service->delete($trustee);

        return redirect()
            ->route('trustees.index')
            ->with('success', 'Trustee deleted successfully.');
    }
}