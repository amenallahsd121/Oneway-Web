import cv2
import pytesseract
import sys


image_path = sys.argv[1]
img = cv2.imread(image_path)
gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

# Configuration de pytesseract pour la détection de texte
config = "--psm 6"
pytesseract.pytesseract.tesseract_cmd = r'C:/Program Files/Tesseract-OCR/tesseract.exe'

# Apply thresholding to binarize the image
thresh = cv2.threshold(gray, 0, 255, cv2.THRESH_BINARY_INV + cv2.THRESH_OTSU)[1]

# Perform OCR using pytesseract
text = pytesseract.image_to_string(thresh)

# Split the text by newline character to get each line
lines = text.split('\n')

# Loop through each line and split by colon to get the values
output_str = ""
for line in lines:
    if ':' in line:
        key, value = line.split(':')
        # Check if value contains any spaces after the text characters
        if len(value.strip()) == 0:
            output_str += "404\n"
        else:
            output_str += f"{value.strip()}\n"

# Return the results as a string
print(output_str)

