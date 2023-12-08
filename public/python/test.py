# -*- coding: UTF-8 -*-
#!/bin/bash
import sys
import os
from rembg import remove
import io
from PIL import Image
import numpy as np
import cv2
import math
import matplotlib.pyplot as plt
from pathlib import Path


def img_angle(img):
    max_area = 0  # 用於跟踪最大矩形的面積
    max_rect = None  # 用於儲存最大矩形的資訊

    # 將圖像轉換為灰度
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

    # 使用閾值二值化圖像
    _, binary_img = cv2.threshold(gray, 128, 255, cv2.THRESH_BINARY)

    # 找到文本區域的輪廓
    contours, _ = cv2.findContours(
        binary_img, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

    # 繪製角度線的圖像副本
    angle_img = img.copy()

    for contour in contours:
        # 忽略過小的輪廓
        if cv2.contourArea(contour) < 100:
            continue

        # 擬合輪廓為矩形
        rect = cv2.minAreaRect(contour)

        # 計算旋轉矩形的角度
        angle = rect[2]

        # 計算矩形的長邊和短邊
        width, height = rect[1]

        # 計算面積
        area = width * height

        # 找到最大的旋轉矩形
        if area > max_area:
            max_area = area
            max_rect = rect

    if max_rect is not None:
        # 繪製最大矩形的角度線
        box = cv2.boxPoints(max_rect)
        box = box.astype(int)
        cv2.drawContours(angle_img, [box], 0, (0, 0, 255), 2)  # 紅色角度線

    # 顯示圖像
    cv2.imshow("Angle Lines", angle_img)
    cv2.waitKey(0)
    cv2.destroyAllWindows()

    if max_rect is not None:
        # 從最大矩形中獲取角度
        angle = max_rect[2]
        return [(angle, angle)]
    else:
        return []


def rotate(image, angle, center=None, scale=1.0):
    # 获取图像尺寸
    (h, w) = image.shape[:2]
    # 若未指定旋转中心，则将图像中心设为旋转中心
    if center is None:
        center = (w / 2, h / 2)
    # 执行旋转
    M = cv2.getRotationMatrix2D(center, angle, scale)
    rotated = cv2.warpAffine(image, M, (w, h))
    # 返回旋转后的图像
    return rotated


def remove_the_blackborder(image):
    # 中值滤波，去除黑色边际中可能含有的噪声干扰
    img = cv2.medianBlur(image, 5)
    # 调整裁剪效果
    b = cv2.threshold(image, 3, 255, cv2.THRESH_BINARY)
    binary_image = b[1]  # 二值图--具有三通道
    binary_image = cv2.cvtColor(binary_image, cv2.COLOR_BGR2GRAY)

    # 找到二值图中的白色像素位置
    edges_y, edges_x = np.where(binary_image == 255)  # 高度和寬度
    bottom = min(edges_y)
    top = max(edges_y)
    height = top - bottom

    left = min(edges_x)
    right = max(edges_x)
    height = top - bottom
    width = right - left

    # 裁剪圖像以移除黑邊
    res_image = image[bottom:bottom + height, left:left + width]

    return res_image


if __name__ == '__main__':

    print(sys.argv)

    input_path = Path(sys.argv[1])
    file = input_path.name
    fname = input_path.stem
    fextension = input_path.suffix

    store_path = Path(sys.argv[2])
    # 检查输出目录是否存在，如果不存在，则创建它
    if not store_path.exists():
        store_path.mkdir(parents=True)

    output_path = str(store_path / file)

    with open(input_path, 'rb') as i:
        with open(output_path, 'wb') as o:
            input = i.read()
            output = remove(input)
            o.write(output)
    print(output_path)
    src_img = cv2.imread(output_path)  # 使用彩色圖像模式讀取圖像
    # cv2.imshow("rotated", src_img)
    # cv2.waitKey(0)
    # cv2.destroyAllWindows()
    angle_list = img_angle(src_img)
    print("檢測到的角度：", angle_list[0][0])

    angle = angle_list[0][0]
    angle_rotate = -(90-angle)
    # print("旋轉的角度：", angle_rotate)
    rotated = rotate(src_img, angle_rotate)
    # cv2.imshow("rotated", rotated)
    # cv2.waitKey(0)
    # cv2.destroyAllWindows()

    rm_img = remove_the_blackborder(rotated)

    if rm_img.shape[0] > rm_img.shape[1]:
        rm_img = cv2.rotate(rm_img, cv2.ROTATE_90_COUNTERCLOCKWISE)

    img2 = rm_img.copy()
    x = round(img2.shape[0]*0.34)
    y = round(img2.shape[1]*0.2)
    w = round(2.6*x)
    h = round(1.2*y)
    crop_img = img2[y:y+h, x:x+w]        # 取出陣列的範圍

    cv2.imwrite(output_path, crop_img)
    print("done!")
    exit(0)
