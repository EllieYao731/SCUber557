<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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

        // try {
        //     // 上傳圖像並取得路徑
        //     $imagePath = $request->file('image')->store('uploads', 'public');
        //     $absoluteImagePath = public_path("storage/$imagePath");

        //     // 調整亮度和對比度
        //     $adjustedImagePath = $this->adjustImage($imagePath);
        //     $adjustedAbsoluteImagePath = public_path("storage/$adjustedImagePath");

        //     $croppedImagePath = $this->cropImage($adjustedImagePath);
        //     $croppedAbsoluteImagePath = public_path("storage/$croppedImagePath");

        // 上传图像并获取路径
        $imagePath = $request->file('image')->store('uploads', 'public');
        $absoluteImagePath = public_path("storage/$imagePath");

        // 调用Python脚本处理图像
        $pythonScriptPath = public_path('python/a.py');
        $outputFolder = '../../storage/app/public/processed_images';
        if (!file_exists($outputFolder)) {
            mkdir($outputFolder, 0755, true);
        }

        $process = new Process(["python", $pythonScriptPath, $absoluteImagePath, $outputFolder]);
        $process->run();
        // // echo $absoluteImagePath;

        if (!$process->isSuccessful()) {
        //     // 获取标准输出和错误输出
        //     $output = $process->getOutput();
            $errorOutput = $process->getErrorOutput();

        //     // throw new ProcessFailedException($process);
        //     // echo $output;
        //     echo "<br/>";
            echo $errorOutput;
        }


        $outputImagePath = $outputFolder . '/' . uniqid() . '.jpg';

        // 返回视图，传递处理后的图像路径
        return view('test', [
            'imagePath' => $imagePath,
            'absoluteImagePath' => $absoluteImagePath,
            'outputImagePath' => $outputImagePath, // 将处理后的图像路径传递给视图
        ]);
    }



            // // 使用 Tesseract OCR 辨識文字
            // $recognizedText = (new TesseractOCR($absoluteImagePath))
            //     ->lang('chi_tra')
            //     ->userPatterns('/SCUber577/public/user-patterns.txt')
            //     ->psm(6)
            //     ->run();
            // $adrecognizedText = (new TesseractOCR($adjustedAbsoluteImagePath))
            //     ->lang('chi_tra')
            //     ->userPatterns('/SCUber577/public/user-patterns.txt')
            //     ->psm(11)
            //     ->run();
            // $croppedText = (new TesseractOCR($croppedAbsoluteImagePath))
            //     ->lang('chi_tra')
            //     ->userPatterns('/SCUber577/public/user-patterns.txt')
            //     ->psm(11)
            //     ->run();


            // return view('test', [
            //     'imagePath' => $imagePath,
            //     'absoluteImagePath' => $absoluteImagePath,
                // 'adjustedImagePath' => $adjustedImagePath,
                // 'croppedImagePath' => $croppedImagePath,
                // 'recognizedText' => $recognizedText,
                // 'croppedText' => $croppedText,
                // 'adrecognizedText' => $adrecognizedText,
    //         ]);
    //     } catch (\Exception $e) {
    //         // 處理異常，例如上傳失敗、圖像處理失敗、OCR 失敗等
    //         \Log::error('Exception: ' . $e->getMessage());

    //         return view('test', ['error' => $e->getMessage()]);
    //     }
    // }

    // private function adjustImage($imagePath)
    // {
    //     $absoluteImagePath = public_path("storage/$imagePath");
    //     $originalImage = Image::make($absoluteImagePath);

    //     // 調整亮度和對比度
    //     $adjustedImage = $originalImage->brightness(4)->contrast(70);

    //     // 儲存調整後的圖像
    //     $adjustedImagePath = 'adjusted/adjusted_' . basename($imagePath);
    //     Storage::disk('public')->put($adjustedImagePath, $adjustedImage->encode());

    //     return $adjustedImagePath;
    // }

    // private function cropImage($adjustedImagePath)
    // {
    //     $absoluteImagePath = public_path("storage/$adjustedImagePath");
    //     $originalImage = Image::make($absoluteImagePath);

    //     // 定義裁剪的坐標
    //     $x_start = 110;
    //     $x_end = 280;
    //     $y_start = 110;
    //     $y_end = 158;

    //     // 裁剪圖像
    //     $croppedImage = $originalImage->crop($x_end - $x_start, $y_end - $y_start, $x_start, $y_start);

    //     // 儲存裁剪後的圖像
    //     $croppedImagePath = 'cropped/cropped_' . basename($adjustedImagePath);
    //     Storage::disk('public')->put($croppedImagePath, $croppedImage->encode());

    //     return $croppedImagePath;
    // }

}
