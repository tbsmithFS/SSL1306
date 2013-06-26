#!/usr/bin/python

import cgi

from controllers.api import API

query = cgi.FieldStorage()

if 'controller' not in query:
	con = 'api'
else:
	con = query.getvalue('controller')

if 'action' not in query:
	action = 'homepage'
else:
	action = query.getvalue('action')


if con == 'api':
	api = API()
	api.dispatch(action)
else:
	print "didn't recognize controller " + str(con)