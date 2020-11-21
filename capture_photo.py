import cv2
import os
from PIL import Image
from PIL import ImageTk
import numpy as np

def capturing():
    face_classifier = cv2.CascadeClassifier("haarcascade_frontalface_default.xml") 

    # Change id here
    id_stu = 2

    def face_cropped(img):
        gray  = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        faces = face_classifier.detectMultiScale(gray,1.3,5)
        #scaling factor=1.3
        #Minimum neighbor = 5

        if faces is ():
            return None
            for(x,y,w,h) in faces:
                cropped_face=img[y:y+h,x:x+w]
            return cropped_face

        cap = cv2.VideoCapture(0)
        img_id=0

        while True:
            ret,frame = cap.read()
            if face_cropped(frame) is not None:
                img_id+=1
                face = cv2.resize(face_cropped(frame),(200,200))
                face  = cv2.cvtColor(face, cv2.COLOR_BGR2GRAY)
                file_name_path = "/home/pi/Desktop/smart-checking-attendance/dataset/user."+str(id_stu)+"."+str(img_id)+".jpg"
                cv2.imwrite(file_name_path,face)
                cv2.putText(face,str(img_id),(50,50),cv2.FONT_HERSHEY_COMPLEX,1, (0,255,0),2)
                # (50,50) is the origin point from where text is to be written
                # font scale=1
                #thickness=2

                cv2.imshow("Cropped face",face)
                if cv2.waitKey(1)==13 or int(img_id)==200:
                    break
        cap.release()
        cv2.destroyAllWindows()