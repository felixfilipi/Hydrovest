import cv2
import numpy as np

def leaf_spot_disease(img):
    pic= cv2.imread(img)
    pic = cv2.resize(pic, dsize=(500, 400), interpolation=cv2.INTER_CUBIC)
    gray=cv2.cvtColor(pic,cv2.COLOR_BGR2GRAY)
    blur = cv2.GaussianBlur(gray,(5,5),5)
    _,thres = cv2.threshold(blur, 100,250, cv2.THRESH_TOZERO)
    res = cv2.Canny(thres, 100, 250, L2gradient=True)

    try:
        circles = cv2.HoughCircles(res,cv2.HOUGH_GRADIENT,1,20,param1=200,param2=15,minRadius=80,maxRadius=100)
        circles = np.uint16(np.around(circles))
        mask = np.full((res.shape[0], res.shape[1]), 1, dtype=np.uint8)  # mask is only 
        clone = pic.copy()
        for i in circles[0, :]:
            cv2.circle(mask, (i[0], i[1]), i[2], (255, 255, 255), -1)
            cv2.circle(clone, (i[0], i[1]), i[2], (255, 255, 255), 1)

        # get first masked value (foreground)
        fg = cv2.bitwise_or(res, res, mask=mask)

        # get second masked value (background) mask must be inverted
        mask = cv2.bitwise_not(mask)
        background = np.full(res.shape, 255, dtype=np.uint8)
        bk = cv2.bitwise_or(background, background, mask=mask)

        # combine foreground+background
        final = cv2.bitwise_or(fg, bk)

        circles2 = cv2.HoughCircles(final,cv2.HOUGH_GRADIENT,1,20,param1=10,param2=12,minRadius=0,maxRadius=15)
        for j in circles2[0,:]:
            cv2.circle(clone,(int(j[0]),int(j[1])),5,(255,255,255),2)

        if (circles2.shape[1] > 3):
            return('Leaf Spot Detected')
        else:
            return('Normal')

    except:
        return("Hole Not Found")