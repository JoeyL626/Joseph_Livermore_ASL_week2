
<form enctype="multipart/form-data" action="<?php echo base_url('/Welcome/signup'); ?>" method="POST">
	<fieldset>

	Email :<input type="text" name="email" value="" placeholder="email" /><br>

	Password (for your account): <input type="password" name="upassword" value="" placeholder="password" /><br>

	Viewer Password (for viewers/<br>
	use different then account password): <input type="password" name="vpassword" value="" placeholder="password" /><br>

	First Name: <input type="text" name="fname" value="" placeholder="firstname" /><br>

	Last Name: <input type="text" name="lname" value="" placeholder="lastname" /><br>

	Address: <input type="text" name="address" placeholder="address" value=""/><br>

	City: <input type="text" name="city" placeholder="city" value=""/><br>

	State: <input type="text" name="state" placeholder="state" value=""/><br>

	Zip: <input type="text" name="zip" placeholder="zip" value=""/><br>

    <input type="submit" name="submit" value="Signup"/>

   	</fieldset>
</form>