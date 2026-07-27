<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Services\SettingService;

class SettingController extends Controller
{
    protected SettingService $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    /**
     * Display the Trust Settings page.
     */
    public function edit()
    {
        $setting = $this->service->get();

        return view('settings.edit', compact('setting'));
    }

    /**
     * Update Trust Settings.
     */
    public function update(UpdateSettingRequest $request)
    {
        $this->service->update($request->validated());

        return redirect()
            ->route('settings.edit')
            ->with('success', 'Trust Settings updated successfully.');
    }
}