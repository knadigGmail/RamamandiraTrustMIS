<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\UploadedFile;

class CustomerService
{
    public function create(array $data): Customer
    {
        // Generate Customer Code
        $data['customer_code'] = CodeGeneratorService::generate(
            'customers',
            'customer_code',
            'CUS'
        );

        // Upload Photo
        if (
            isset($data['photo']) &&
            $data['photo'] instanceof UploadedFile
        ) {
            $data['photo'] = PhotoUploadService::upload(
                $data['photo'],
                'customers'
            );
        }

        return Customer::create($data);
    }

    public function update(Customer $customer, array $data): Customer
    {
        // Replace Photo
        if (
            isset($data['photo']) &&
            $data['photo'] instanceof UploadedFile
        ) {
            $data['photo'] = PhotoUploadService::upload(
                $data['photo'],
                'customers',
                $customer->photo
            );
        }

        $customer->update($data);

        return $customer;
    }

    public function delete(Customer $customer): void
    {
        PhotoUploadService::delete($customer->photo);

        $customer->delete();
    }
}