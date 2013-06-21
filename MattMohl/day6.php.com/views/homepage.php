<html>
<body>

<h2>Local Database Searching</h2>

<ul>
<li>For a random user: <a href="?controller=api&action=random">Click Here</a></li>
<li>
	<p>For advanced searching, use this form</p>
	<h5>Valid Fields (lowercase):</h5>
	<ul>
		<li>firstname</li>
		<li>lastname</li>
		<li>address</li>
		<li>city</li>
		<li>state</li>
		<li>zip</li>
		<li>phone</li>
	</ul>
	<form action="?controller=api&action=advanced" enctype="multipart/form-data" method="post">
		Search Field: <input name="searchField" type="text"/><br/>
		Search Term: <input name="searchTerm" type="text"/><br/>
		<input type="submit" value="Search"/>
	</form>
</li>
</ul>
</body>
</html>