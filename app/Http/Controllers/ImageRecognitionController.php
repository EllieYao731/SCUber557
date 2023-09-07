<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Intervention\Image\ImageManagerStatic as Image;
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

        $imagePath = $request->file('image')->store('uploads', 'public');
        $absoluteImagePath = public_path("storage/$imagePath");

        // 调整亮度和对比度
        $adjustedImagePath = $this->adjustImage($imagePath);
        $adabsolutejustedImagePath = public_path("storage/$adjustedImagePath");

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

        if (strpos($recognizedText, "組") !== false || strpos($adrecognizedText, "組") !== false) {
            $split_text = "組";
        } elseif (strpos($recognizedText, "班") !== false || strpos($adrecognizedText, "班") !== false) {
            $split_text = "班";
        } else {
            $split_text = "學系";
        }

        return view('test', [
            'imagePath' => $imagePath,
            'adjustedImagePath' => $adjustedImagePath,
            'recognizedText' => $recognizedText,
            'adrecognizedText' => $adrecognizedText,
        ]);
    }

    private function adjustImage($imagePath)
    {
        $absoluteImagePath = public_path("storage/$imagePath");
        $originalImage = Image::make($absoluteImagePath);
        // 调整亮度和对比度
        $adjustedImage = $originalImage->brightness(0)->contrast(30);

        // 保存调整后的图像
        $adjustedImagePath = 'adjusted/adjusted_' . basename($imagePath);
        Storage::disk('public')->put($adjustedImagePath, $adjustedImage->encode());

        return $adjustedImagePath;
    }

    public function cropAndRecognize(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 定義 x 和 y 的起始和結束位置
        $x_start = 530;
        $x_end = 1200;
        $y_start = 400;
        $y_end = 700;

        $imagePath = $request->file('image')->store('uploads', 'public');
        $absoluteImagePath = public_path("storage/$imagePath");

        // 讀取圖像
        $img_student = Image::make($absoluteImagePath);

        // 通過切片操作讀取特定坐標範圍的圖像區域
        $roi = $img_student->crop($x_end - $x_start, $y_end - $y_start, $x_start, $y_start);

        // 保存或進一步處理 roi 區域
        // 這裡可以對 $roi 做一些後續處理，例如保存或進行其他操作
        $croppedImagePath = 'cropped/cropped_' . basename($imagePath);
        Storage::disk('public')->put($croppedImagePath, $roi->encode());

        // 顯示裁剪後的圖像（可選）
        // 這裡顯示裁剪後的圖像，如果需要的話，你可以使用類似的方式顯示圖像

        // 將圖像轉換為灰度
        $gray = $roi->greyscale();

        // 對圖像進行二值化處理
        $binary = $gray->threshold(1);

        // 使用Tesseract OCR庫識別身份證號碼和姓名
        $config = '--psm 6';
        $id_number = (new TesseractOCR($binary))
            ->configFile($config)
            ->lang('chi_tra')
            ->run();

        // 輸出結果
        return view('test', [
            'imagePath' => $imagePath,
            'recognizedText' => $id_number,
        ]);
    }
}
