<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    //Ensures no model events are dispatched
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Created new customers.\n";

        Customer::factory(25)
            ->hasInvoices(10)
            ->create();

        Customer::factory(100)
            ->hasInvoices(3)
            ->create();

        Customer::factory(100)
            ->hasInvoices(1)
            ->create();

        Customer::factory(5)
            ->create();
    }

}
