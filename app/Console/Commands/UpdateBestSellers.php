<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
class UpdateBestSellers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-best-sellers';

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
    // Reset all
    Product::query()->update(['is_best_seller' => false]);

    // Get top sellers based on order frequency
    $topProducts = DB::table('order_items')
        ->select('product_id', DB::raw('COUNT(*) as order_count'))
        ->groupBy('product_id')
        ->orderByDesc('order_count')
        ->limit(8)
        ->get()
        ->pluck('product_id');

    // Update best sellers
    Product::whereIn('id', $topProducts)
        ->update(['is_best_seller' => true]);

    $this->info('Updated '.$topProducts->count().' best sellers');
}// php artisan app:update-best-sellers tu run this function
}
