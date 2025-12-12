<?php

namespace App\Console\Commands;

use App\Models\SanPham;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateProductSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:generate-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for all products that don\'t have slugs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Đang tạo slug cho các sản phẩm...');

        $products = SanPham::whereNull('slug_san_pham')
            ->orWhere('slug_san_pham', '')
            ->get();

        if ($products->isEmpty()) {
            $this->info('Tất cả sản phẩm đã có slug!');
            return 0;
        }

        $this->info("Tìm thấy {$products->count()} sản phẩm cần tạo slug.");

        $bar = $this->output->createProgressBar($products->count());
        $bar->start();

        $updated = 0;
        foreach ($products as $product) {
            $slug = $this->createUniqueSlug($product->ten_san_pham, $product->id);
            
            $product->update([
                'slug_san_pham' => $slug
            ]);

            $updated++;
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Đã tạo slug cho {$updated} sản phẩm!");

        return 0;
    }

    /**
     * Tạo slug duy nhất từ tên sản phẩm
     */
    private function createUniqueSlug($tenSanPham, $excludeId = null)
    {
        $slug = Str::slug($tenSanPham);

        // Kiểm tra slug trùng lặp
        $query = SanPham::where('slug_san_pham', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        
        $count = $query->count();
        
        // Nếu slug đã tồn tại, thêm số vào cuối
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        return $slug;
    }
}
