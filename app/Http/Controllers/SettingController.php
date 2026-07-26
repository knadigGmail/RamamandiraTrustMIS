<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Services\SettingService;

class SettingController extends Controller
{
    protected SettingService $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $setting = $this->service->get();

        return view('settings.index', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $this->service->update($request->validated());

        return redirect()
            ->route('settings.index')
            ->with('success', 'Trust Profile updated successfully.');
    }
}