#!/usr/bin/python


class Register():

    def __init__(self, form_data={}, validation_data={}):
        self.form_data = form_data
        self.validation_data = validation_data
        print '''
<html>
<head>
<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

Register Page!<br/>
The rules are:<br/>
<ul>
<li>Name must contain letters and spaces only</li>
<li>Email must be like name@example.com</li>
<li>VerifyEmail must be same as Email</li>
<li>Password must be at least eight characters long</li>
<li>Rating must be chosen</li>
<li>Fav number must be an integer</li>
</ul>
    '''

        from views.helpers.form_builder import FormBuilder

        form = FormBuilder(self.validation_data, self.form_data)
        form.formHeader('/user/perform_register')
        form.textInput('name')
        form.textInput('email')
        form.textInput('verifyemail')
        form.textInput('password', True)
        form.radio('rating', ('1', '2', '3', '4'))
        form.textInput('favNumber')
        form.submit()
        form.formCloser()

        print '''
</body>
</html>
        '''
