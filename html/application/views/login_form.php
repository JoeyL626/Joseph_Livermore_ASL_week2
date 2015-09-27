
<form enctype="multipart/form-data" action="<?php echo base_url('/Welcome/login'); ?>" method="POST">
	<fieldset>
	
	Are you a User or just viewing someone elses list?<br>
	<input type="radio" name="usertype" value="user">User
	<input type="radio" name="usertype" value="viewer">Viewer<br>

	Email :<input type="text" name="email" value="" placeholder="email" /><br>

	Password: <input type="password" name="password" value="" placeholder="password"/><br>

    <input type="submit" name="submit" value="Login"/>

   	</fieldset>
</form>