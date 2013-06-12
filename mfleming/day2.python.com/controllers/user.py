#!/usr/bin/python

from models.view import View

class User():
	def dispatch(self, query=()):
		if "action" not in query:
			action = "home"
		else:
			action = query.getvalue("action")
			
		data = {"username": "John",
					"controller": "User"}	
			
		v = View()
		v.print_header()

		v.get_view("header", data)
		
		if action == "home":
			v.get_view("user_home", data)
		else:
			v.get_view("user_home", data)
		
		v.get_view("footer", data)