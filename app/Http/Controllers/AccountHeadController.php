<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountHeadRequest;
use App\Http\Requests\UpdateAccountHeadRequest;
use App\Models\AccountHead;
use App\Services\AccountHeadService;
use Illuminate\Http\Request;

class AccountHeadController extends Controller
{
    protected AccountHeadService $service;

    public function __construct(AccountHeadService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $accountHeads = $this->service->paginate(
            $request->search
        );

        return view(
            'account-heads.index',
            compact('accountHeads')
        );
    }

    public function create()
    {
        return view('account-heads.create', [

            'parents' => $this->service->parents(),

        ]);
    }

    public function store(StoreAccountHeadRequest $request)
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route('account-heads.index')
            ->with('success', 'Account Head created successfully.');
    }

    public function show(AccountHead $accountHead)
    {
        return view(
            'account-heads.show',
            compact('accountHead')
        );
    }

    public function edit(AccountHead $accountHead)
    {
        return view('account-heads.edit', [

            'accountHead' => $accountHead,

            'parents' => $this->service->parents(),

        ]);
    }

    public function update(
        UpdateAccountHeadRequest $request,
        AccountHead $accountHead
    ) {

        $this->service->update(
            $accountHead,
            $request->validated()
        );

        return redirect()
            ->route('account-heads.index')
            ->with('success', 'Account Head updated successfully.');
    }

    public function destroy(AccountHead $accountHead)
    {
        $this->service->delete($accountHead);

        return redirect()
            ->route('account-heads.index')
            ->with('success', 'Account Head deleted successfully.');
    }
}