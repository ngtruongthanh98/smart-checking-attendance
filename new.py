import tkinter as tk
from tkinter import messagebox
from tkinter import *
import cv2
import os
from PIL import Image
from PIL import ImageTk
import numpy as np
import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522
import mysql.connector
import time

window=Tk()
window.title("Face recognition system")

#Set Background Image to window
path = '/home/pi/Desktop/smart-checking-attendance/LogoBK.jpg'
image = Image.open(path)

image = image.resize((300,300), Image.ANTIALIAS)
img = ImageTk.PhotoImage(image)

imgLabel = Label(window, image=img).place(x=600,y=10)


#window.config(background="lime")
l1=tk.Label(window,text="First name",font=("Algerian",20))
l1.grid(column=0, row=0)
t1=tk.Entry(window,width=50,bd=5)
t1.grid(column=1, row=0)

l2=tk.Label(window,text="Last name",font=("Algerian",20))
l2.grid(column=0, row=1)
t2=tk.Entry(window,width=50,bd=5)
t2.grid(column=1, row=1)

l3=tk.Label(window,text="Student id",font=("Algerian",20))
l3.grid(column=0, row=2)
t3=tk.Entry(window,width=50,bd=5)
t3.grid(column=1, row=2)

l4=tk.Label(window,text="Email",font=("Algerian",20))
l4.grid(column=0, row=3)
t4=tk.Entry(window,width=50,bd=5)
t4.grid(column=1, row=3)

def checking_attendance():
    
    
    # 1) Check the sv
    mydb=mysql.connector.connect(
        host="localhost",
        user="admin",
        passwd="password",
        database="attendance"
    )
    cursor = mydb.cursor()
    reader = SimpleMFRC522()
    
    try:
        while True:
#             print('Place card \nrecord attendance')
            messagebox.showinfo('Notification','Place card \nrecord attendance')
            
            id, text = reader.read()
            
            cursor.execute("select first_name, last_name, student_number FROM student_table where rfid_uid="+str(id))
            result = cursor.fetchone()
            
            if cursor.rowcount >= 1:
#                 print("welcome " + result[1])
                messagebox.showinfo('Notification','Welcome ' + result[0])


                
                # 2) Check khuon mat
    
    
                # 3) Check timetable
                
                cursor.execute("Insert into attendance_table (first_name, last_name, student_number) VALUES (%s,%s,%s)", (result[0],result[1],result[2],))
                mydb.commit()
                
                
            else:
#                 print("User does not exist")
                messagebox.showinfo('Notification','User does not exist')

                time.sleep(2)
                
    finally:
        GPIO.cleanup()

    


b1=tk.Button(window,text="Check Attendance",font=("Algerian",20),bg='green',fg='white',command=checking_attendance)
b1.place(x=10, y=180)

def train_classifier():
    data_dir="/home/pi/Desktop/smart-checking-attendance/dataset"
    path = [os.path.join(data_dir,f) for f in os.listdir(data_dir)]
    faces  = []
    ids   = []
    
    for image in path:
        img = Image.open(image).convert('L');
        imageNp= np.array(img, 'uint8')
        id = int(os.path.split(image)[1].split(".")[1])
        
        faces.append(imageNp)
        ids.append(id)
    ids = np.array(ids)
    
    #Train the classifier and save
    clf = cv2.face.LBPHFaceRecognizer_create()
    clf.train(faces,ids)
    clf.write("classifier.xml")
    messagebox.showinfo('Result','Training dataset completed!!!')

b3=tk.Button(window,text="Training Dataset",font=("Algerian",20),bg='orange',fg='red',command=train_classifier)
b3.place(x=10,y=240)
        
def generate_dataset():
    if(t1.get()=="" or t2.get()=="" or t3.get()=="" or t4.get()==""):
        messagebox.showinfo('Result','Please provide complete details of the user')
    else:
        mydb=mysql.connector.connect(
            host="localhost",
            user="admin",
            passwd="password",
            database="attendance"
        )
        mycursor=mydb.cursor()
        mycursor.execute("SELECT * FROM student_table")
        myresult=mycursor.fetchall()
        id_stu=1
        for x in myresult:
            id_stu+=1
        sql="INSERT INTO student_table(id_stu,first_name,last_name,student_number,email) values(%s,%s,%s,%s,%s)"
        val=(id_stu,t1.get(),t2.get(),t3.get(),t4.get())
        mycursor.execute(sql,val)
        mydb.commit()
        
        print("Saved to database")
        messagebox.showinfo('Notification','Saved to database \nStart camera to capture images')
        
        face_classifier = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
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
                if cv2.waitKey(1)==13 or int(img_id)==10:
                    break
        cap.release()
        cv2.destroyAllWindows()
        messagebox.showinfo('Result','Generating dataset completed!!!')
        
        mydb=mysql.connector.connect(
            host="localhost",
            user="admin",
            passwd="password",
            database="attendance"
        )
            
        mycursor=mydb.cursor()
        reader = SimpleMFRC522()
        
        messagebox.showinfo('Noti','Put card to read')


        mycursor.execute("SELECT * FROM student_table")
        myresult=mycursor.fetchall()

        try:
            id, text = reader.read()
            print(id)
    
            sql="UPDATE student_table SET rfid_uid = %s WHERE student_number=%s"
            val=(id, t3.get())
            mycursor.execute(sql,val)
            mydb.commit()
    
            messagebox.showinfo('Result','Saved to database')


        finally:
            GPIO.cleanup()
        
        

b4=tk.Button(window,text="Generate Dataset",font=("Algerian",20),bg='orange',fg='red',command=generate_dataset)
b4.place(x=300,y=180)

window.geometry("910x320")
window.mainloop()


