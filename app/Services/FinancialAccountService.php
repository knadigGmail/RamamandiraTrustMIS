<?php

namespace App\Services;

use App\Models\FinancialAccount;

class FinancialAccountService
{
    public function create(array $data)
    {
        if (!empty($data['is_default'])) {

            FinancialAccount::query()->update([
                'is_default' => false
            ]);
        }

        return FinancialAccount::create($data);
    }

    public function update(FinancialAccount $account, array $data)
    {
        if (!empty($data['is_default'])) {

            FinancialAccount::query()
                ->where('id', '!=', $account->id)
                ->update([
                    'is_default' => false
                ]);
        }

        $account->update($data);

        return $account;
    }

    public function delete(FinancialAccount $account)
    {
        return $account->delete();
    }
}