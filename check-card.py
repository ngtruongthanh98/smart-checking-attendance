#!/usr/bin/env_python

import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522
import os
import mysql.connector
import time

# reader = SimpleMFRC522()
# print("Put card to read")
# 
# 
# try:
#     id, text = reader.read()
#     print(id)
# 
# finally:
#     GPIO.cleanup()


mydb=mysql.connector.connect(
    host="localhost",
    user="admin",
    passwd="password",
    database="attendance"
)
            
mycursor=mydb.cursor()
reader = SimpleMFRC522()
print("Put card to read")

mycursor.execute("SELECT * FROM student_table")
myresult=mycursor.fetchall()
id_stu=4


try:
    id, text = reader.read()
    print(id)
    
    sql="UPDATE student_table SET rfid_uid = %s WHERE id_stu=%s"
    val=(id, id_stu)
    mycursor.execute(sql,val)
    mydb.commit()
    
    print("Saved to database")


finally:
    GPIO.cleanup()
        