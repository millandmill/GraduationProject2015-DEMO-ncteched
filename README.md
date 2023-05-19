# อ่านฉัน #

### Project Tracking ###

[NCTECHED](https://ncteched.orangescrum.com/)

### การแก้ไขไฟล์ ###
1. หลังจาก โคลนไฟล์มาแล้ว ให้ทำการแตก branch ใหม่ โดยใช้คำสั่ง git checkout -b branch_name_here
2. พอแก้ไข ไฟล์เสร็จ พร้อมที่จะส่ง ให้ทำการ เช็คสเตตัสไฟล์ก่อน เพื่อดูว่าเราได้แก้ไขระบ้าง โดยใช้คำสั่ง git status (โดยไฟล์ที่เราแก้ไขจะขึ้นเป็นสีแดง)
3. จากนั้น เพิ่มไฟล์ที่เราต้องการส่ง โดยใช้คำสั่ง git add /path/filename
4. ลองใช้คำสั่ง git status อีกรอบ เพื่อดูว่าเราได้เพิ่มไฟล์อะไรเข้าไปบ้าง (ไฟล์ที่เราเพิ่มจะเป็นสีเขียว)
5. ก่อน จะ push เราต้อง คอมเม้นรายละเอียดไฟล์ก่อน ว่าเราแก้ไขอะไรไปบ้าง โดย ใช้คำสั่ง git commit -m "comment this here"
6. แล้วก็ git push original branch_name_here ได้เลย

* การของ merge request เดี๋ยวค่อยมาต่อ ยังไม่เคยลองเหมือนกัน นอนก่อนแปป นึกไม่ออก ฮ่าๆ

# อีเมลที่เอาไว้ทำหรับทดสอบ
email : `ncteched.kmutnb@gmail.com`
password : `kmutnb123456`

# วิธีตตั้งค่า server #

## remote server
host 139.59.100.238
password mill1234

`ssh root@139.59.100.238`

## database server

### local @ 139.59.100.238
password mill1993
`mysql -u root -p`

### remote @ 139.59.100.238
host 139.59.100.238
user root
password mill2536

`mysql -u root -h 139.59.100.238 -p`

### phpmyadmin http://139.59.100.238/phpmyadmin

* user root
* pass mill1993

* --
# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* Quick summary
* Version
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

* Summary of set up
* Configuration
* Dependencies
* Database configuration
* How to run tests
* Deployment instructions

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact