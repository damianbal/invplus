<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Invoice;
use App\Services\InvoiceService;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $user = User::create([
            'email' => 'test@test.com',
            'password' => Hash::make('test123'),
            'name' => 'Test Account'
        ]);

        $client = $user->clients()->create([
            'name' => 'Test client'
        ]);

        $inv = Invoice::create([
            'name' => 'Example Invoice',
            'user_id' => $user->id,
            'client_id' => $client->id
        ]);

        $invoiceService = new InvoiceService;
        $invoiceService->setInvoice($inv);
        $invoiceService->addItem([
            'name' => 'PC Setup',
            'description' => 'Installing OS', 
            'cost' => 30,
            'quantity' => 1,
        ]);
    }
}
