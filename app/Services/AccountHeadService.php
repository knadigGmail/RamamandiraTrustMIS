<?php

namespace App\Services;

use App\Models\AccountHead;

class AccountHeadService
{
    public function paginate($search = null)
    {
        return AccountHead::when($search, function ($q) use ($search) {

                $q->where('account_code', 'like', "%{$search}%")
                  ->orWhere('account_name', 'like', "%{$search}%");

            })
            ->orderBy('account_code')
            ->paginate(15);
    }

    public function create(array $data)
    {
        return AccountHead::create($data);
    }

    public function update(AccountHead $accountHead, array $data)
    {
        $accountHead->update($data);

        return $accountHead;
    }

    public function delete(AccountHead $accountHead)
    {
        return $accountHead->delete();
    }

    public function parents()
    {
        return AccountHead::orderBy('account_name')->get();
    }
}