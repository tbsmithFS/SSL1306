#!/usr/bin/python

from models.DBConnector import DBConnector

print "Content-type: text/html\n\n"

db = DBConnector()

db.get_random_user()

db.add_user("34626", "34t43t", "123 main st",
            "xcitylo", "WW", "2314124124", "41232")
