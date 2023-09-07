<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage;

class ImageRecognitionController extends Controller
{
    public function showUploadForm()
    {
        return view('test');
    }

    public function uploadAndRecognize(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // 上傳圖像並取得路徑
            $imagePath = $request->file('image')->store('uploads', 'public');
            $absoluteImagePath = public_path("storage/$imagePath");

            // 調整亮度和對比度
            $adjustedImagePath = $this->adjustImage($imagePath);
            $adjustedAbsoluteImagePath = public_path("storage/$adjustedImagePath");

            $croppedImagePath = $this->cropImage($imagePath);
            $croppedAbsoluteImagePath = public_path("storage/$croppedImagePath");



            // 使用 Tesseract OCR 辨識文字
            $recognizedText = (new TesseractOCR($absoluteImagePath))
                ->lang('chi_tra')
                ->userPatterns('/SCUber577/public/user-patterns.txt')
                ->psm(6)
                ->run();
            $adrecognizedText = (new TesseractOCR($adabsolutejustedImagePath))
                ->lang('chi_tra')
                ->userPatterns('/SCUber577/public/user-patterns.txt')
                ->psm(6)
                ->run();
            $croppedText = (new TesseractOCR($croppedAbsoluteImagePath))
                ->lang('chi_tra')
                ->userPatterns('/SCUber577/public/user-patterns.txt')
                ->psm(6)
                ->run();
            return view('test', [
                'imagePath' => $imagePath,
                'adjustedImagePath' => $adjustedImagePath,
                'croppedImagePath' => $croppedImagePath,
                'recognizedText' => $recognizedText,
                'croppedText' => $croppedText,
            ]);
        } catch (\Exception $e) {
            // 處理異常，例如上傳失敗、圖像處理失敗、OCR 失敗等
            return view('test', ['error' => $e->getMessage()]);
        }
    }

    private function adjustImage($imagePath)
    {
        $absoluteImagePath = public_path("storage/$imagePath");
        $originalImage = Image::make($absoluteImagePath);

        // 調整亮度和對比度
        $adjustedImage = $originalImage->brightness(0)->contrast(30);

        // 儲存調整後的圖像
        $adjustedImagePath = 'adjusted/adjusted_' . basename($imagePath);
        Storage::disk('public')->put($adjustedImagePath, $adjustedImage->encode());

        return $adjustedImagePath;
    }

    private function cropImage($imagePath)
    {
        $cropImagePath = public_path("storage/$imagePath");
        $initialImage = Image::make($cropImagePath);

        // 定義裁剪的坐標
        $x_start = 530;
        $x_end = 2200;
        $y_start = 400;
        $y_end = 100;

        // 裁剪圖像
        $croppedImage = $initialImage->crop($x_end - $x_start, $y_end - $y_start, $x_start, $y_start);

        // 儲存調整後的圖像
        $croppedImagePath = 'cropped/cropped_' . basename($imagePath);
        Storage::disk('public')->put($croppedImagePath, $croppedImage->encode());

        return $croppedImagePath;
    }
}
