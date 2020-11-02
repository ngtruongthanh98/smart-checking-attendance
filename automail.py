import yagmail
import os
import datetime

try:
    #initializing the server connection
    yag = yagmail.SMTP(user='attendancesystembku@gmail.com', password='!attendancesystem')
    #sending the email
    yag.send(to='1755012014giang@ou.edu.vn', subject='Anh yeu em', contents='Huynh Thi Cam Giang <3 Nguyen Truong Thanh\n Nguyen Truong Thanh <3 Huynh Thi Cam Giang')
    print("Email sent successfully")
except:
    print("Error, email was not sent")



# Nho mo bao mat google