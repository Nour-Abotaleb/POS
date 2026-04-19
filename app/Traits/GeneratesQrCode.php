<?php

namespace App\Traits;

use App\Helper\Files;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Support\Facades\Storage;

trait GeneratesQrCode
{
    public function createQrCode(string $qrUrl, ?string $label = null)
    {
        try {
            $fileName = $this->getQrCodeFileName();
            $filePath = public_path(Files::UPLOAD_FOLDER . '/qrcodes/' . $fileName);

            // Use only the working approach - no Builder pattern
            $writer = new PngWriter();
            
            // Create a simple QR code without complex configuration
            $qrCode = new QrCode($qrUrl);
            $result = $writer->write($qrCode);

            Files::createDirectoryIfNotExist('qrcodes');
            $result->saveToFile($filePath);

            Files::fileStore(
                new File($filePath),
                'qrcodes',
                $fileName,
                uploaded: false,
                restaurantId: $this->getRestaurantId()
            );

            // Move file to cloud storage
            if (config('filesystems.default') !== 'local') {
                $contents = FileFacade::get($filePath);
                Storage::disk(config('filesystems.default'))->put('qrcodes/' . $fileName, $contents);
                // Delete local file
                unlink($filePath);
            }
            
            \Log::info('QR Code generated successfully', [
                'url' => $qrUrl,
                'file' => $fileName,
                'restaurant_id' => $this->getRestaurantId()
            ]);

        } catch (\Exception $e) {
            // Log but never throw - this prevents transaction rollback
            \Log::error('QR Code generation failed: ' . $e->getMessage(), [
                'url' => $qrUrl,
                'label' => $label,
                'restaurant_id' => $this->getRestaurantId(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    abstract protected function getQrCodeFileName(): string;
    abstract protected function getRestaurantId(): int;
}
