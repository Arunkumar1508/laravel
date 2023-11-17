<?php

namespace App\Jobs;

use App\amazon_buys;
use App\Amazon_trending;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;

class Trendingsale implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //


    }

    /**
     * Execute the job.
     *
     * @return void
     */


    //  public function handle

    public function handle()
    {
        $way = amazon_buys::select("product_id", DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->get();

        $way1 = $way->filter(function ($item) {
            return $item->count > 2;

        });
        Amazon_trending::truncate();
        foreach ($way1 as $value) {
            Amazon_trending::create([
                "product_id" => $value->product_id

            ]);

        }
    }
}
