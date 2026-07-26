<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Hall;
use App\Services\HallService;
use Illuminate\Http\Request;

class HallController extends Controller
{
    protected HallService $service;

    public function __construct(HallService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $halls = Hall::query()

            ->when($search, function ($query) use ($search) {

                $query->where('hall_code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");

            })

            ->latest()

            ->paginate(10);

        return view('halls.index', [

            'halls' => $halls,

            'totalHalls' => Hall::count(),

            'activeHalls' => Hall::where('status', true)->count(),

'acHalls' => Hall::where('dining_capacity', '>', 0)->count(),
            'totalCapacity' => Hall::sum('capacity'),

        ]);
    }

    public function create()
    {
        return view('halls.create');
    }

    public function store(StoreHallRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo');
        }

        $this->service->create($data);

        return redirect()
            ->route('halls.index')
            ->with('success', 'Hall created successfully.');
    }

    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }

    public function edit(Hall $hall)
    {
        return view('halls.edit', compact('hall'));
    }

    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo');
        }

        $this->service->update($hall, $data);

        return redirect()
            ->route('halls.index')
            ->with('success', 'Hall updated successfully.');
    }

    public function destroy(Hall $hall)
    {
        $this->service->delete($hall);

        return redirect()
            ->route('halls.index')
            ->with('success', 'Hall deleted successfully.');
    }
    public function details(\App\Models\Hall $hall)
{
    return response()->json([

        'hall_rent' => $hall->hall_rent,

        'security_deposit' => $hall->security_deposit,

        'electricity_charges' => $hall->electricity_charges,

        'cleaning_charges' => $hall->cleaning_charges,

        'total' =>

            $hall->hall_rent +

            $hall->security_deposit +

            $hall->electricity_charges +

            $hall->cleaning_charges,

    ]);
}
}