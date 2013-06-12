#!/usr/bin/python

import cgi

query = cgi.FieldStorage()

print "Content-type: text/html\n\n"

if 'controller' not in query:
    con = 'user'
else:
    con = query.getvalue('controller')

if con == 'user':
    from controllers.user import User
    user = User()
    user.dispatch(query)
