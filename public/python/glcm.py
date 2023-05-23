import numpy as np 
import pandas as pd 
import os
from PIL import Image
import cv2 as cv
import matplotlib.pyplot as plt

def show_image(img, cmap='gray'):
    fig = plt.figure(figsize=(20,20))
    axes = fig.add_subplot(111)
    axes.imshow(img, cmap=cmap)

# Show dataset
test_img = Image.open(r"F:\kuliah\Skripsi\deteksi_app\public\python\dataset\Gelap\1.jpg")

left = int(test_img.size[0]/2-224/2)
upper = int(test_img.size[1]/2-100/2)
right = left +224
lower = upper + 100

im_cropped = test_img.crop((left, upper,right,lower))
show_image(np.asarray(im_cropped))
im_cropped = im_cropped.save("F:\kuliah\Skripsi\deteksi_app\public\python\dataset\Gelap\hasil1.jpg")

# Show hasil crop
test_img = cv.imread('F:\kuliah\Skripsi\deteksi_app\public\python\dataset\Gelap\hasil1.jpg')
test_img = cv.cvtColor(test_img, cv.COLOR_BGR2RGB)
show_image(test_img)

# Show
# storing image path
fname = r'F:\kuliah\Skripsi\deteksi_app\public\python\dataset\Gelap\hasil1.jpg'
 
# opening image using pil
image = Image.open(fname).convert("L")
 
# mapping image to gray scale
plt.imshow(image, cmap='gray')
plt.show()

