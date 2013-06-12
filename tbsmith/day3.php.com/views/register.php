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

<?php

include 'views/helpers/form_builder.php';

$form = new FormBuilder($validation_data, $form_data);
$form->formHeader('/user/perform_register');
$form->textInput('name');
$form->textInput('email');
$form->textInput('verifyemail');
$form->textInput('password', true);
$form->radio('rating', array('1', '2', '3', '4'));
$form->textInput('favNumber');
$form->submit();
$form->formCloser();

?>

</body>
</html>
