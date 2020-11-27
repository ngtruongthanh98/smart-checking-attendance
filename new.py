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
import datetime
import calendar
import pandas as pd
import smtplib

import dlib
from math import hypot

window=Tk()
window.title("Face recognition system")

#Set Background Image to window
path = '/home/pi/Desktop/smart-checking-attendance/LogoBK.jpg'
image = Image.open(path)

image = image.resize((300,300), Image.ANTIALIAS)
img = ImageTk.PhotoImage(image)

imgLabel = Label(window, image=img).place(x=600,y=10)

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

l5=tk.Label(window,text="Subject code",font=("Algerian",20))
l5.grid(column=0, row=4)
t5=tk.Entry(window,width=50,bd=5)
t5.grid(column=1, row=4)

def checking_attendance(): 
    global value
    value = 1
    
    def call_var():
        global value
        value = 0
    
    detector = dlib.get_frontal_face_detector()
    predictor = dlib.shape_predictor("shape_predictor_68_face_landmarks.dat")
    
    def midpoint(p1,p2):
        return int((p1.x + p2.x)/2),int((p1.y + p2.y)/2)

    font = cv2.FONT_HERSHEY_SIMPLEX

    def get_blinking_ratio(eye_points, facial_landmarks):
        left_point = (facial_landmarks.part(eye_points[0]).x, facial_landmarks.part(eye_points[0]).y)
        right_point = (facial_landmarks.part(eye_points[3]).x, facial_landmarks.part(eye_points[3]).y)
        hor_line = cv2.line(img, left_point, right_point,(0,255,0), 1)

        center_top = midpoint(facial_landmarks.part(eye_points[1]), facial_landmarks.part(eye_points[2]))
        center_bottom = midpoint(facial_landmarks.part(eye_points[5]), facial_landmarks.part(eye_points[4]))
        ver_line = cv2.line(img, center_top, center_bottom,(0,255,0), 1)

        #length of the line
        hor_line_length = hypot((left_point[0] - right_point[0]), (left_point[1] - right_point[1]))
        ver_line_length = hypot((center_top[0] - center_bottom[0]), (center_top[1] - center_bottom[1]))
        ratio = hor_line_length/ ver_line_length, ver_line_length
        return ratio

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

        messagebox.showinfo('Notification','Click OK then \nPlace card to record attendance')
            
        id_card, text = reader.read()
            
        cursor.execute("select first_name, last_name, student_number FROM student_table where rfid_uid="+str(id_card))
        result = cursor.fetchone()
            
        if cursor.rowcount >= 1:
            messagebox.showinfo('Notification','Welcome ' + result[0] +'\nClick OK to start Camera')
            print(result[0]+"'s RFID card")
            
            # 2) Check khuon mat
            def draw_boundary(img,classifier,scaleFactor,minNeighbors,color,text,clf):
                gray_image = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
                features = classifier.detectMultiScale(gray_image,scaleFactor,minNeighbors)
                coords = []

                for(x,y,w,h) in features:
                    cv2.rectangle(img,(x,y),(x+w,y+h),color,2)

                    id,pred = clf.predict(gray_image[y:y+h,x:x+w])
                    confidence = int(100*(1-pred/300))
                    
                    def check_attendance_main():
                        
                        mydb=mysql.connector.connect(
                            host="localhost",
                            user="admin",
                            passwd="password",
                            database="attendance"
                        )
                        
                        mycursor=mydb.cursor()
                        mycursor.execute("select first_name from student_table where id_stu="+str(id))
                        s = mycursor.fetchone()
                        s = ''+''.join(s)
                          
                        # Compare info of card and face recognition
                        mycursor2=mydb.cursor()
                        mycursor2.execute("select rfid_uid from student_table where id_stu="+str(id))
                        s2 = mycursor2.fetchone()
                        s2 = ''+''.join(s2)
                        
                        def check_timetable_and_sendmail():
                            # 3) Check timetable                            
                            def findDay(date):
                                born = datetime.datetime.strptime(date, '%d/%m/%Y').weekday()
                                return (calendar.day_name[born])                            
                            
                            day = datetime.datetime.now().strftime( "%d/%m/%Y" )
                            print("day = " + day)
                            
                            print(findDay(day))
                            
                            hour = datetime.datetime.now().strftime( "%H:%M" )
                            print("hour = " + hour)
                            hour = datetime.datetime.strptime(hour, '%H:%M')
                            
                            mycursor5=mydb.cursor()
                            mycursor5.execute("SELECT class_list FROM student_table WHERE id_stu="+str(id))
                            class_list = mycursor5.fetchone()
                            class_list = ''+''.join(class_list)                            
           
                            splited_list = class_list.split(", ")
                            
                            c = [int(e) for e in splited_list]
                            
                            today = datetime.datetime.now().strftime( "%d/%m/%Y" )
                            
                            for no_class in c:
                                mycursor6=mydb.cursor()
                                mycursor6.execute("SELECT start_time FROM class_table WHERE id_class="+ str(no_class))
                                start_time = mycursor6.fetchone()
                                start_time = ''+''.join(start_time)
                                start_time_x = datetime.datetime.strptime(start_time, '%H:%M')
                                
                                mycursor6.execute("SELECT end_time FROM class_table WHERE id_class="+ str(no_class))
                                end_time = mycursor6.fetchone()
                                end_time = ''+''.join(end_time)
                                end_time_x = datetime.datetime.strptime(end_time, '%H:%M')
                                
                                mycursor6.execute("SELECT day_in_week FROM class_table WHERE id_class="+ str(no_class))
                                day_in_week = mycursor6.fetchone()
                                day_in_week = ''+''.join(day_in_week)
                                
                                id_class = str(no_class)
                                
                                if(day_in_week == findDay(today)):
                                    # tiep tuc kiem tra tiet hoc (start_time & end_time)
                                    if((hour > start_time_x) and (hour < end_time_x)):                                   
                                        
                                        mycursor3=mydb.cursor()
                                        mycursor3.execute("SELECT * FROM attendance_table")
                                        id_atd=1
                                        myresult=mycursor.fetchall()                   
                                        for x in myresult:
                                            id_atd+=1
                                        mycursor3.execute("INSERT INTO attendance_table (id_atd, first_name, last_name, student_number, class_number) VALUES (%s,%s,%s,%s,%s)", (id_atd,result[0],result[1],result[2],id_class,))
                                        mydb.commit() 
                                        print("Save attendance data to database\n")
                                        
                                        # send mail at here
                                        mycursor4=mydb.cursor()
                                        mycursor4.execute("select email from student_table WHERE id_stu="+str(id))
                                        email = mycursor4.fetchone()
                                        email = ''+''.join(email)
                                
                                        mycursor4.execute("select first_name from student_table where id_stu="+str(id))
                                        first_name = mycursor4.fetchone()
                                        first_name = ''+''.join(first_name)                                
                                        
                                        mycursor4.execute("select subject_name from class_table where id_class="+str(no_class))
                                        subject_name = mycursor4.fetchone()
                                        subject_name = ''+''.join(subject_name)                                
                                        
                                        mycursor4.execute("select subject_code from class_table where id_class="+str(no_class))
                                        subject_code = mycursor4.fetchone()
                                        subject_code = ''+''.join(subject_code)                                
                                        
                                        mycursor4.execute("select day_in_week from class_table where id_class="+str(no_class))
                                        day_in_week = mycursor4.fetchone()
                                        day_in_week = ''+''.join(day_in_week)                                
                                       
                                        mycursor4.execute("select start_time from class_table where id_class="+str(no_class))
                                        start_time = mycursor4.fetchone()
                                        start_time = ''+''.join(start_time)                                
                                        
                                        mycursor4.execute("select end_time from class_table where id_class="+str(no_class))
                                        end_time = mycursor4.fetchone()
                                        end_time = ''+''.join(end_time)                                
                                        
                                        mycursor4.execute("select room from class_table where id_class="+str(no_class))
                                        room = mycursor4.fetchone()
                                        room = ''+''.join(room)                                
                                
                                        to = email
                                        gmail_user = 'attendancesystembku@gmail.com'
                                        gmail_pwd = '!attendancesystem'
                                        smtpserver = smtplib.SMTP("smtp.gmail.com",587)
                                        smtpserver.ehlo()
                                        smtpserver.starttls()
                                        smtpserver.ehlo
                                        smtpserver.login(gmail_user, gmail_pwd)
                                        date = datetime.datetime.now().strftime( "%d/%m/%Y %H:%M" )                                
                                        header = 'To: ' + to + '\n' + 'From: ' + gmail_user + '\n' + 'Subject: Check attendance completed\n'
                                        body = '\nWelcome ' + first_name + ',\n\nYour attendance is marked at: ' + date + '\n\nSubject: ' + subject_name +' (' + subject_code + ') '
                                        footer = '\n\n' + day_in_week + ' From: ' +start_time + ' To: ' + end_time + ' Room: ' + room
                                        msg = header  + body + footer
                                        print(msg)
                                        smtpserver.sendmail(gmail_user, to, msg)
                                        print('sent mail\n____________________________________')
                                        smtpserver.close()                                       

                                    else:
                                        print("Correct day, but no class now")
                                        print("No class available!!!\n____________________________________")
                                        messagebox.showerror('Error','No class available!!!')
                                    
                                else:
                                    print("No class today")
                                    print("No class available!!!\n____________________________________")
                                    messagebox.showerror('Error','No class available!!!')

                           
                        # If wrong person in 10s -> return notification]
                        if (confidence < 74):
                            print("Unknown face")
                            while True:
                                time.sleep(1)
                                print(round(delta,0), "s")
                                    
                                if (confidence > 74) and (delta < 10):
                                    # Check card
                                    if (s2 == str(id_card)):
                                        print("Case 1: Face exists in database and compatible with RFID")
                                        check_timetable_and_sendmail()
                                        call_var()
                                        break
                                    
                                    else:
                                        print("Case 2: Face exists in database and doesnt compatible with RFID card")
                                        print("____________________________________")
                                        messagebox.showerror('Error','Wrong person\nFace images are not compatible with the RFID card')
                                        call_var()
                                        break
                                    
                                if (delta > 10):
                                    print("Case 3: RFID card with Unknown face")
                                    print("____________________________________")
                                    messagebox.showerror('Error','Unknown person\nFace images are not compatible with the RFID card')
                                    call_var()
                                    break
                                
                        else:
                            # Check card
                            if (s2 == str(id_card)):
                                print("Case 1: Face exists in database and compatible with RFID")
                                check_timetable_and_sendmail()
                                call_var()
                                    
                            else:
                                print("Case 2: Face exists in database and doesnt compatible with RFID card")
                                print("____________________________________")
                                messagebox.showerror('Error','Wrong person\nFace images are not compatible with the RFID card')
                                call_var()

                    check_attendance_main()

                    coords=[x,y,w,h]
                return coords

            def recognize(img,clf,faceCascade):
                coords = draw_boundary(img,faceCascade,1.1,10,(255,255,255),"Face",clf)
                return img

            faceCascade=cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
            clf = cv2.face.LBPHFaceRecognizer_create()
            clf.read("Trainer.xml")

            video_capture =  cv2.VideoCapture(0)
            
            begin = time.time()
            delta = 0
            global first_read
            first_read= True
            
            while True:
                ret,img = video_capture.read()
                
                
                gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
                faces = detector(gray)
                
                for face in faces:
                    #x, y = face.left(), face.top()
                    #x1, y1 = face.right(), face.bottom()
                    #cv2.rectangle(frame, (x,y), (x1,y1), (0,255,0), 3 )# green box, thickness of box
                    landmarks = predictor(gray, face)
                    
                    left_eye_ratio,_ = get_blinking_ratio([36,37,38,39,40,41], landmarks)
                    
                    right_eye_ratio, myVerti = get_blinking_ratio([42,43,44,45,46,47], landmarks)
                    
                    blinking_ratio = (left_eye_ratio+right_eye_ratio)/2
                    
                    if(blinking_ratio >= 6):
                        cv2.putText(img, "blinking", (50,50), cv2.FONT_HERSHEY_SIMPLEX, 2, (255,0,0))
                        print("blinking")
                        
                        img = recognize(img,clf,faceCascade)
                    
                    elif((blinking_ratio < 6) and (delta>30)):
                        print("No blink detect")
                        print("Fake image----")
                        messagebox.showerror('Error','-------Fake image-------')
                        print("____________________________________")
                        call_var()
                        
                cv2.imshow("face detection",img)
                
                delta = time.time() - begin
                    
                print(value)
                time.sleep(1)
                
                if (cv2.waitKey(1)==ord('q') or int(value) == 0):
                    break

            video_capture.release()
            cv2.destroyAllWindows()    
                
        else:
            messagebox.showerror('Error','User does not exist')
            print("User does not exist")
            print("____________________________________")

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
    clf.write("Trainer.xml")

    messagebox.showinfo('Result','Training dataset completed!!!')

b2=tk.Button(window,text="Training Dataset",font=("Algerian",20),bg='orange',fg='red',command=train_classifier)
b2.place(x=10,y=240)
        
def generate_dataset():
    if(t1.get()=="" or t2.get()=="" or t3.get()=="" or t4.get()=="" or t5.get()==""):
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

        mycursor2=mydb.cursor()
        mycursor2.execute("SELECT id_class, subject_code FROM class_table")
        rows=mycursor2.fetchall()
        
        id_stu=1
        for x in myresult:
            id_stu+=1

        class_list= t5.get()
        print(class_list)
        
        splited_list=class_list.split(" ")
        print(splited_list)

        list_of_id=[]
        for i in splited_list:
            for row in rows:
                if(i == row[1]):
                    list_of_id.append(row[0])
                    
        print(list_of_id)
        
        values = ', '.join(str(v) for v in list_of_id)

        sql="INSERT INTO student_table(id_stu,first_name,last_name,student_number,email,username,password,class_list) values(%s,%s,%s,%s,%s,%s,%s,%s)"
        val=(id_stu,t1.get(),t2.get(),t3.get(),t4.get(),t3.get(),t3.get(),values)
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
                if cv2.waitKey(1)==ord('q') or int(img_id)==200:
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
        
        messagebox.showinfo('Notification','Click OK then\nPut card to register')


        mycursor.execute("SELECT * FROM student_table")
        myresult=mycursor.fetchall()

        try:
            id_card, text = reader.read()
            print(id_card)
    
            sql="UPDATE student_table SET rfid_uid = %s WHERE student_number=%s"
            val=(id_card, t3.get())
            mycursor.execute(sql,val)
            mydb.commit()
    
            messagebox.showinfo('Result','Registration completed!!!')

        finally:
            GPIO.cleanup()            

    # send mail at here    
    to = t4.get()
    gmail_user = 'attendancesystembku@gmail.com'
    gmail_pwd = '!attendancesystem'
    smtpserver = smtplib.SMTP("smtp.gmail.com",587)
    smtpserver.ehlo()
    smtpserver.starttls()
    smtpserver.ehlo
    smtpserver.login(gmail_user, gmail_pwd)
    date = datetime.datetime.now().strftime( "%d/%m/%Y %H:%M" )
    header = 'To: ' + to + '\n' + 'From: ' + gmail_user + '\n' + 'Subject: Register completed \n'
    print(header)
    msg = header +  '\nDear ' + t1.get() + ',\n\n' + 'Thank you for registering for attendance-system-bku\n' + 'Register time: '+ date +'\nIf you have any questions, please let we know!\n\n' +  'Regards,\n\n' + 'attendance-system-bku'
    smtpserver.sendmail(gmail_user, to, msg)
    print('sent mail')
    print("____________________________________")
    smtpserver.close()

b3=tk.Button(window,text="Generate Dataset",font=("Algerian",20),bg='orange',fg='red',command=generate_dataset)
b3.place(x=300,y=180)

# def access_website():
# 
# b4=tk.Button(window,text="Access Website",font=("Algerian",20),bg='green',fg='white',command=generate_dataset)
# b4.place(x=300,y=240)

window.geometry("910x320")
window.mainloop()