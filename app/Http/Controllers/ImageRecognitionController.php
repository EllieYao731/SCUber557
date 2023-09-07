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

        // 調整亮度和對比度
        $adjustedImagePath = $this->adjustImage($imagePath);
        $adabsolutejustedImagePath = public_path("storage/$adjustedImagePath");

        // 定義 x 和 y 的起始和結束位置
        $x_start = 530;
        $x_end = 1200;
        $y_start = 400;
        $y_end = 700;

        // 讀取圖像
        $img_student = Image::make($absoluteImagePath);

        // 通過切片操作讀取特定坐標範圍的圖像區域
        $roi = $img_student->crop($x_end - $x_start, $y_end - $y_start, $x_start, $y_start);

        // 保存或進一步處理 roi 區域
        $croppedImagePath = 'cropped/cropped_' . basename($imagePath);
        Storage::disk('public')->put($croppedImagePath, $roi->encode());

        // 顯示裁剪後的圖像（可選）
        // 這裡顯示裁剪後的圖像，如果需要的話，你可以使用類似的方式顯示圖像

        // 將圖像轉換為灰度
        $gray = $roi->greyscale();

        // 保存臨時圖像文件（供 OCR 使用）
        $tempImagePath = 'temp/temp_' . basename($imagePath);
        Storage::disk('public')->put($tempImagePath, $gray->encode());

        // 對圖像進行二值化處理
        $tempImageFullPath = public_path("storage/$tempImagePath");
        $image = imagecreatefromjpeg($tempImageFullPath);
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        imagefilter($image, IMG_FILTER_THRESHOLD, 1);
        imagejpeg($image, $tempImageFullPath);
        imagedestroy($image);

        // 使用Tesseract OCR庫識別身份證號碼和姓名
        $config = '--psm 6';
        $id_number = (new TesseractOCR($tempImageFullPath))
            ->configFile($config)
            ->lang('chi_tra')
            ->run();

        // 刪除臨時圖像文件
        Storage::disk('public')->delete($tempImagePath);

        return view('test', [
            'imagePath' => $imagePath,
            'adjustedImagePath' => $adjustedImagePath,
            'croppedImagePath' => $croppedImagePath,
            'recognizedText' => $id_number,
        ]);
    }

    private function adjustImage($imagePath)
    {
        $absoluteImagePath = public_path("storage/$imagePath");
        $originalImage = Image::make($absoluteImagePath);
        // 調整亮度和對比度
        $adjustedImage = $originalImage->brightness(0)->contrast(30);

        // 保存調整後的圖像
        $adjustedImagePath = 'adjusted/adjusted_' . basename($imagePath);
        Storage::disk('public')->put($adjustedImagePath, $adjustedImage->encode());

        return $adjustedImagePath;
    }
}
