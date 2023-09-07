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

            // 定義裁剪的坐標
            $x_start = 530;
            $x_end = 1200;
            $y_start = 400;
            $y_end = 1000;

            // 讀取圖像
            $originalImage = Image::make($absoluteImagePath);

            // 在圖像上畫一個矩形以標識裁剪的區域（僅用於檢查）
            $originalImage->rectangle($x_start, $y_start, $x_end, $y_end, function ($draw) {
                $draw->border(2, [255, 0, 0]); // 紅色邊框
            });

            // 裁剪圖像
            $croppedImage = $originalImage->crop($x_end - $x_start, $y_end - $y_start, $x_start, $y_start);

            // 儲存裁剪後的圖像
            $croppedImagePath = 'cropped/cropped_' . basename($imagePath);
            Storage::disk('public')->put($croppedImagePath, $croppedImage->encode());

            // 將圖像轉為灰度
            $grayImage = $croppedImage->greyscale();

            // 儲存臨時圖像文件（供 OCR 使用）
            $tempImagePath = 'temp/temp_' . basename($imagePath);
            Storage::disk('public')->put($tempImagePath, $grayImage->encode());

            // 使用 Tesseract OCR 辨識文字
            $config = '--psm 6';
            $recognizedText = (new TesseractOCR(public_path("storage/$tempImagePath")))
                ->configFile($config)
                ->lang('chi_tra')
                ->run();

            // 刪除臨時圖像文件
            Storage::disk('public')->delete($tempImagePath);

            return view('test', [
                'imagePath' => $imagePath,
                'adjustedImagePath' => $adjustedImagePath,
                'croppedImagePath' => $croppedImagePath,
                'recognizedText' => $recognizedText,
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
}
