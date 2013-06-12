#!/usr/bin/python


class User:

    def dispatch(self, query):
        if 'action' not in query:
            action = 'show_register_form'
        else:
            action = query.getvalue('action')

        if action == 'show_register_form':
            self.show_register_form()
        elif action == 'perform_register':
            validation_data = self.perform_register(query)
            if validation_data['successful'] is True:
                self.show_success_page()
            else:
                self.show_register_form(query, validation_data)
        else:
            print "Didn't recognize action " + action

    def show_register_form(self, form_data={}, validation_data={}):
        from views.register import Register
        Register(form_data, validation_data)

    def perform_register(self, form_data={}):
        from views.helpers.form_validator import FormValidator
        form_validator = FormValidator()
        validation_data = form_validator.validate(form_data)
        return validation_data

    def show_success_page(self):
        from views.register_success import RegisterSuccess
        RegisterSuccess()
