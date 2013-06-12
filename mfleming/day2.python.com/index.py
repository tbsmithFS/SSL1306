#!/usr/bin/python

import cgi

query = cgi.FieldStorage()

if "controller" not in query:
	con = "home"
else:
	con = query.getvalue("controller")
	
if con == "home":
	from controllers.home import Home
	Home().dispatch(query)
elif con == "user":
	from controllers.user import User
	User().dispatch(query)
else:
	from controllers.home import Home
	Home().dispatch(query)