<?php

namespace App\Services;

use App\Models\Seva;

class SevaService
{
    public function create(array $data)
    {
        return Seva::create($data);
    }

    public function update(Seva $seva, array $data)
    {
        $seva->update($data);

        return $seva;
    }

    public function delete(Seva $seva)
    {
        return $seva->delete();
    }
}