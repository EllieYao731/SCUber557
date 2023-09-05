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
        // 定义要读取的坐标范围
        $x_start = 530;
        $x_end = 1200;
        $y_start = 400;
        $y_end = 700;
        $roi = imagecrop($absoluteImagePath, ['x' => $x_start, 'y' => $y_start, 'width' => $x_end - $x_start, 'height' => $y_end - $y_start]);
        $recognizedText = (new TesseractOCR($roi))
                        ->lang('chi_tra')
                        ->userPatterns('/SCUber577/public/user-patterns.txt')
                        ->psm(6)
                        ->run();
        $adrecognizedText = (new TesseractOCR($adabsolutejustedImagePath))
        ->lang('chi_tra')
        ->userPatterns('/SCUber577/public/user-patterns.txt')
        ->psm(6)
        ->run();

        if (strpos($recognizedText, "組")!== false || strpos($adrecognizedText, "組")!== false) {
            $split_text="組";
        }elseif (strpos($recognizedText, "班")!== false || strpos($adrecognizedText, "班")!== false) {
            $split_text="班";
        }else {
            $split_text="學系";
        }

        // $recognizedText = "學號".explode("學號",explode($split_text,$recognizedText)[0].$split_text)[1];
        // $adrecognizedText = "學號".explode("學號",explode($split_text,$adrecognizedText)[0].$split_text)[1];
        return view('test', [
            'imagePath' => $imagePath,
            'adjustedImagePath' => $adjustedImagePath,
            'recognizedText' => $recognizedText,
            'adrecognizedText' => $adrecognizedText]);
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

}
