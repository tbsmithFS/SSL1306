#!/usr/bin/python

from models.view import View

class Home():
	def dispatch(self, query=()):
		if "action" not in query:
			action = "home"
		else:
			action = query.getvalue("action")
			
		data = {"username": "Guest",
					"controller": "Home"}	
			
		v = View()
		v.print_header()

		v.get_view("header", data)
		
		if action == "home":
			v.get_view("home", data)
		elif action == "aboutUs":
			v.get_view("about", data)
		else:
			v.get_view("home", data)
		
		v.get_view("footer", data)