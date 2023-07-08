import csv
import cv2
import numpy as np
import face_recognition
import os
from datetime import datetime

import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode

path = 'images'
Images = []
ClassNames = []
list = os.listdir(path)
print(list)
for cl in list:
    currentimg = cv2.imread(f'{path}/{cl}')
    Images.append(currentimg)
    ClassNames.append(os.path.splitext(cl)[0])
    print(ClassNames)


def getencodings (Images):
    encodinglist = []
    for img in Images:
        img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
        encodeimg = face_recognition.face_encodings(img)[0]
        encodinglist.append(encodeimg)
    return encodinglist

def attendance(name):
    # ENTER DATA IN CSV
    with open('attendance.csv', 'r+') as f:
        myDatalist = f.readlines()
        nameList = []
        for line in myDatalist:
            entry = line.split(',')
            nameList.append(entry[0])
        if name not in nameList:
            now = datetime.now()
            dtString = now.strftime('%H:%M:%S')
            f.writelines(f'{name},{dtString}\n')

    if name not in nameList:
        try:
            connection = mysql.connector.connect(host='localhost', database='student_db', user='root', password='')
            cursor = connection.cursor()
            csv_data = csv.reader(open('attendance.csv'))
            with open("attendance.csv", "r", encoding="utf-8") as file:
                last_line = file.readlines()[-1]
                last_line = tuple(last_line.split(","))
                print(last_line)
                # print('here')
            cursor.execute('INSERT INTO mark_attendance (rollno, temp_date) VALUES (%s ,%s)', last_line)
            connection.commit()
            cursor.close()

        except mysql.connector.Error as error:
            print("Failed to insert record into Laptop table {}".format(error))

enclist = getencodings(Images)
print('Encoding Complete')


cap = cv2.VideoCapture(0)

while True:
    success, img = cap.read()
    imgS = cv2.resize(img,(0,0),None, 0.25, 0.25)
    imgS = cv2.cvtColor(imgS, cv2.COLOR_BGR2RGB)

    facedetectionFrame = face_recognition.face_locations(imgS)
    encodecurFrame = face_recognition.face_encodings(imgS, facedetectionFrame)

    for encodeFace, faceLoc in zip(encodecurFrame, facedetectionFrame):
        matches = face_recognition.compare_faces(enclist,encodeFace)
        faceDis = face_recognition.face_distance(enclist,encodeFace)
        # print(faceDis)
        matchIndex = np.argmin(faceDis)

        if matches[matchIndex]:
            name = ClassNames[matchIndex].upper()
            # print(name)
            y1,x2,y2,x1 = faceLoc
            y1, x2, y2, x1 = y1*4,x2*4 ,y2*4 ,x1*4
            cv2.rectangle(img, (x1,y1),(x2,y2),(255,0,0),2)
            attendance(name)


    cv2.imshow('Webcam', img)
    cv2.waitKey(1)
