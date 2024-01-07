<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Billed, pending or validated
        $status= $this->faker->randomElement(['B', 'P', 'V']);
        return [
//            'customer_id' => Customer::factory()->create()->id,//This does not generate the expected customers...
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 3000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisYear(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade(): NULL,
        ];
    }
}
