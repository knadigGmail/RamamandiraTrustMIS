<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonorRequest;
use App\Http\Requests\UpdateDonorRequest;
use App\Models\Donor;
use App\Services\DonorService;

class DonorController extends Controller
{
    protected DonorService $service;

    public function __construct(DonorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $search = request('search');

        $query = Donor::query();

        if ($search) {

            $query->where('donor_code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
        }

        $donors = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $totalDonors = Donor::count();
        $activeDonors = Donor::where('status',1)->count();
        $inactiveDonors = Donor::where('status',0)->count();

        return view('donors.index', compact(
            'donors',
            'search',
            'totalDonors',
            'activeDonors',
            'inactiveDonors'
        ));
    }

    public function create()
    {
        return view('donors.create');
    }

    public function store(StoreDonorRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('donors.index')
            ->with('success','Donor created successfully.');
    }

    public function show(Donor $donor)
    {
        return view('donors.show', compact('donor'));
    }

    public function edit(Donor $donor)
    {
        return view('donors.edit', compact('donor'));
    }

    public function update(UpdateDonorRequest $request, Donor $donor)
    {
        $this->service->update($donor,$request->validated());

        return redirect()
            ->route('donors.index')
            ->with('success','Donor updated successfully.');
    }

    public function destroy(Donor $donor)
    {
        $this->service->delete($donor);

        return redirect()
            ->route('donors.index')
            ->with('success','Donor deleted successfully.');
    }
}