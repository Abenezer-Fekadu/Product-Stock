<?php

namespace App\Console\Commands;
use App\Models\Products;
use App\Models\InterestHistory;

use Carbon\Carbon;


use Illuminate\Console\Command;

class InterstCalculate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'int:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate Interest to 20%';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");

        $products = Products::all();
        foreach($products as $product)
        {
            $actual_start_at = Carbon::parse($product->created_at);
            $actual_end_at = Carbon::parse(now());

            $value = $actual_end_at->diffInHours($actual_start_at, true);

            dd($value);

            if ( 1 >= value){
                $new = ($product->price * 2) / 10;

                
                InterestHistory::create([
                    'name' => $product->name,
                    'product_id' => $product->id,
                    'price' => $new
                ]);
            }
        }
        return 0;
    }
}
