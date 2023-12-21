<?php

namespace App\Http\Controllers;

use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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

        // 上传图像并获取路径
        $imagePath = $request->file('image')->store('uploads', 'public');
        $absoluteImagePath = public_path("storage/$imagePath");

        // 调用Python脚本处理图像
        $pythonScriptPath = public_path('python/test.py');
        $outputFolder = storage_path('app/public/processed_images');
        if (!file_exists($outputFolder)) {
            mkdir($outputFolder, 0755, true);
        }

        $command = "/Users/liyingxuan/opt/anaconda3/bin/python $pythonScriptPath $absoluteImagePath $outputFolder";
        $cropImagePath = exec($command);

        // 使用 Laravel 的文件处理函数读取 crop_img 的内容
        $cropImageContents = file_get_contents($cropImagePath);

        $recognizedText = (new TesseractOCR($absoluteImagePath))
            ->lang('chi_tra')
            ->userPatterns('/SCUber577/public/user-patterns.txt')
            ->psm(3)
            ->run();

        preg_match_all('/\d+/', $recognizedText, $matches);
        $numericResults = implode('', $matches[0]);

        if (!preg_match('/^\d{8}$/', $numericResults)) {
            return redirect()->back()->with('error', '辨識失敗，請重新上傳！');
        }
        // Pass the recognized text to the view
        return view('test')->with([
            'imagePath' => $imagePath,
            'cropImageContents' => $cropImageContents,
            'recognizedText' => $recognizedText,
            'numericResults' => $numericResults,
        ]);
    }
}
