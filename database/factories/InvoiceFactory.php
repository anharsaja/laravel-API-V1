<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    
    public function definition(): array
    {
        $status = $this->faker->randomElement(['B', 'P', 'N']);
        
        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100,20000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade() : NULL
        ];
    }
}
