<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ConvertImagesToWebp extends Command
{
    protected $signature = 'convert:webp';
    protected $description = 'Convert all images in storage to WebP format';

    public function handle()
    {
        $files = Storage::disk('public')->allFiles('images');
        $totalFiles = count($files);

        $this->info("Tổng file: " . $totalFiles);

        $bar = $this->output->createProgressBar($totalFiles);
        $bar->start();

        foreach ($files as $file) {

            // Bỏ qua nếu đã là webp
            if (str_ends_with($file, '.webp')) {
                $bar->advance();
                continue;
            }

            $fullPath = storage_path('app/public/' . $file);
            $newPath  = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $file);
            $newFullPath = storage_path('app/public/' . $newPath);

            // Nếu webp đã tồn tại thì bỏ qua
            if (Storage::disk('public')->exists($newPath)) {
                $bar->advance();
                continue;
            }

            try {

                $img = Image::make($fullPath);
                $img->encode('webp', 90);
                $img->save($newFullPath);

                if (file_exists($newFullPath)) {
                    unlink($fullPath);
                }
            } catch (\Exception $e) {
                $this->error("Error: " . $file);
            }

            $bar->advance();
        }

        $bar->finish();
        $this->info("\nDONE ✅");

        return 0;
    }
}
