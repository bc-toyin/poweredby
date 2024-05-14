<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestStoreLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:login {store_id} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $store_id = $this->argument('store_id');
        $email = $this->argument('email');

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Auth-Client' => 'balr5y42lk2b7zg0zt5hwoyh2rpl84s',
            'X-Auth-Token' => 'fugakw1r4aojafe1mevakwx5ikyd6bq'
        ])->post('https://api.bigcommerce.com/franchises/7fcbcd7a-6a6a-4395-addd-09b08388bf04/v1/stores/'. $store_id .'/login-url', [
            'user_email' => $email
        ]);

        dd($response->json());
    }
}
