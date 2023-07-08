🎓 Student Attendance System - Final Year Project 📚

📝 Executive Summary
----------------------
The Student Attendance System using deep entity naming technique is a powerful and cost-effective solution for automating student attendance management. By combining deep learning and image processing technologies, the system detects and recognizes student faces, extracts facial features using the HOG (Histogram of Oriented Gradients) algorithm, and utilizes supervised learning for accurate identification.

📖 Chapter 1: Introduction
---------------------------
🎓 Welcome to the Student Attendance System, my Final Year Project (FYP) - an innovative solution to automate and streamline student attendance management. This project represents the culmination of my academic journey, combining cutting-edge technologies and modern methodologies to revolutionize the traditional attendance recording process. Join me on this exciting journey to transform attendance management in educational institutions!

In traditional attendance management systems, teachers often spend a significant amount of time manually calling out student names and marking attendance. This manual process is time-consuming and prone to errors. The goal of this project is to automate and streamline the attendance recording process by leveraging facial recognition technology. By using a digital camera to detect and recognize faces, the system compares the detected faces with the stored student images in the database. Once a match is found, the attendance is marked, and the attendance record is stored in the database. The system is capable of marking the attendance of multiple students simultaneously, leading to significant time savings for teachers. Additionally, the system generates monthly reports for easy attendance tracking and management.

🌐 Background
--------------
Facial recognition technology has been widely adopted in various industries, including offices for employee attendance management and mobile phones for enhanced password security. The Student Attendance System builds upon these advancements, bringing the same level of accuracy and convenience to student attendance management. By leveraging facial recognition, the system improves efficiency, eliminates manual errors, and provides a secure and reliable method for marking student attendance.

📁 Folder Structure
---------------------
Script:
- attendance.csv: Stores the attendance data in CSV format.
- Main.py: Contains the main Python script for the attendance system.
- pyvenv.cfg: Configuration file for the Python virtual environment.
- images (folder): Contains student images for facial recognition.
- face_recog_dlib_file-master (folder): Contains files related to the face recognition module.

Web_Dashboard:
- db_connection.php: PHP file for the database connection.
- login.php: PHP file for the login page.
- loginstyle.css: CSS file for the login page styling.
- logout.php: PHP file for logging out the user.
- mark_attendance.php: PHP file for marking attendance.
- Dashboard (folder): Contains PHP, HTML, CSS, and JavaScript files for the attendance dashboard.

💻 Installation and Usage
--------------------------
1. Clone this repository to your local machine.
2. Set up the Python environment by creating a virtual environment and activating it:
   - `python -m venv env`
   - `source env/bin/activate`
3. Install the required Python packages using pip:
   - `pip install -r requirements.txt`
4. Run the Python script to start the student attendance system:
   - `python Script/Main.py`
5. Set up the database by importing the SQL file database.sql.
6. Start a web server and configure it to run the Web_Dashboard folder as the root directory.
7. Access the web-based dashboard through your browser and log in to manage attendance records.

Libraries Used
--------------
- OpenCV (cv2): A computer vision library used for face detection and facial feature extraction.
- numpy (np): A library for numerical operations in Python.
- face_recognition: A library for face recognition and facial feature extraction.
- os: A module for interacting with the operating system, used for file handling and directory operations.
- csv: A module for reading and writing CSV files.
- datetime: A module for working with dates and times.
- mysql.connector: A library for connecting to and interacting with MySQL databases.

Contributing
------------
Contributions are welcome! If you would like to contribute to this project, please follow these steps:
1. Fork the repository.
2. Create a new branch: git checkout -b your-branch-name.
3. Make your changes and commit them: git commit -m 'Add your changes'.
4. Push to the branch: git push origin your-branch-name.
5. Submit a pull request outlining your changes.

License
-------
This project is licensed under the MIT License.
python -m venv env
source env/bin/activate

3. Install the required Python packages using pip:

pip install -r requirements.txt

5. Set up the database by importing the SQL file database.sql.
6. Start a web server and configure it to run the Web_Dashboard folder as the root directory.
7. Access the web-based dashboard through your browser and log in to manage attendance records.

📚 Libraries Used
-------------------
- OpenCV (cv2): A computer vision library used for face detection and facial feature extraction.
- numpy (np): A library for numerical operations in Python.
- face_recognition: A library for face recognition and facial feature extraction.
- os: A module for interacting with the operating system, used for file handling and directory operations.
- csv: A module for reading and writing CSV files.
- datetime: A module for working with dates and times.
- mysql.connector: A library for connecting to and interacting with MySQL databases.

🤝 Contributing
----------------
Contributions are welcome! If you would like to contribute to this project, please follow these steps:
1. Fork the repository.
2. Create a new branch: git checkout -b your-branch-name.
3. Make your changes and commit them: git commit -m 'Add your changes'.
4. Push to the branch: git push origin your-branch-name.
5. Submit a pull request outlining your changes.

📄 License
-----------
This project is licensed under the MIT License.
