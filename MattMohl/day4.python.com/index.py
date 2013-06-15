#!/usr/bin/python

import cgi

from models.DBConnector import DBConnector

query = cgi.FieldStorage()
action = query.getvalue('action')

print "Content-type: text/html\n\n"

db = DBConnector()

db.get_random_user()



if action == 'new_user_submit':
	user_data = query
	db.add_user(query.getvalue('firstname'), query.getvalue('lastname'), query.getvalue('address'), query.getvalue('city'), query.getvalue('state'), query.getvalue('zip'), query.getvalue('phone'))
else:
	print "non-recognized action " + str(action)