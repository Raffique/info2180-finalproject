from random import randint
from faker import Faker
import mysql.connector as mariadb


fake = Faker()

userlst = []
issuelst = []
statuslst = ["Open", "Closed", "In Progress"]
typelst = ["Bug", "Proposal", "Task"]
prioritylst = ["Major", "Minor", "Critical"]
devlst2 = [{"firstname" : "Raffique", "lastname" : "Muir", "Userpassword" : "$2y$10$MrzWKXOgYswzol8OEzk4BOM2eWKbIgi.ZDd530d2KkUsgxXO64h7O", "email" : "rm@project2.com", "dateJoined": "0000-00-00"},
            {"firstname" : "Michael", "lastname" : "Pearson", "Userpassword" : "$2y$10$MrzWKXOgYswzol8OEzk4BOM2eWKbIgi.ZDd530d2KkUsgxXO64h7O", "email" : "mp@project2.com", "dateJoined": "0000-00-00"},
            {"firstname" : "Theodore", "lastname" : "Bennett", "Userpassword" : "$2y$10$MrzWKXOgYswzol8OEzk4BOM2eWKbIgi.ZDd530d2KkUsgxXO64h7O", "email" : "tb@project2.com", "dateJoined": "0000-00-00"},
            {"firstname" : "Daniel", "lastname" : "Jennings", "Userpassword" : "$2y$10$MrzWKXOgYswzol8OEzk4BOM2eWKbIgi.ZDd530d2KkUsgxXO64h7O", "email" : "dj@project2.com", "dateJoined": "0000-00-00"},
            {"firstname" : "Tajay", "lastname" : "Edwards", "Userpassword" : "$2y$10$MrzWKXOgYswzol8OEzk4BOM2eWKbIgi.ZDd530d2KkUsgxXO64h7O", "email" : "te@project2.com", "dateJoined": "0000-00-00"}]
devlst = [2,3,4,5,6]
count =0

for i in range(0,24):
    userlst.append({"firstname": fake.unique.first_name(), "lastname": fake.unique.last_name(), "Userpassword": fake.unique.password(), "email": fake.unique.email(), "dateJoined": fake.unique.date()})
    
for i in userlst:
    count+=1
    issuelst.append({"title": fake.unique.sentence(), "IssueDesc": fake.unique.sentence(), "Issuetype": typelst[randint(0,2)], "IssuePriority": prioritylst[randint(0,2)], "IssueStatus": statuslst[randint(0,2)], "assignedTo": devlst[randint(0,4)], "createdBy": count, "created": fake.unique.date(), "updated": fake.unique.date()})

try:
    conn = mariadb.connect(
    host="localhost",
    user="root",
    password="",
    db = "bugme"
    )

    cur = conn.cursor()
    for i in devlst2:
        sql = "INSERT INTO `Users` (`firstname`, `lastname`, `Userpassword`,`email`,`dateJoined`) VALUES (%s, %s, %s, %s, %s)"
        sqlVar = (i["firstname"], i["lastname"], i["Userpassword"], i["email"], i["dateJoined"])
        cur.execute(sql, sqlVar)
        conn.commit()

    for i in userlst:
        sql = "INSERT INTO `Users` (`firstname`, `lastname`, `Userpassword`,`email`,`dateJoined`) VALUES (%s, %s, %s, %s, %s)"
        sqlVar = (i["firstname"], i["lastname"], i["Userpassword"], i["email"], i["dateJoined"])
        cur.execute(sql, sqlVar)
        conn.commit()

    for i in issuelst:
        sql = "INSERT INTO `Issues` (`title`, `IssueDesc`, `Issuetype`,`IssuePriority`,`IssueStatus`, `assignedTo`, `createdBy`,`created`,`updated`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)"
        sqlVar = (i["title"], i["IssueDesc"], i["Issuetype"], i["IssuePriority"], i["IssueStatus"], i["assignedTo"], i["createdBy"], i["created"], i["updated"])
        cur.execute(sql, sqlVar)
        conn.commit()
    cur.close()
except mariadb.Error as e:
    print(f"Error: {e}")