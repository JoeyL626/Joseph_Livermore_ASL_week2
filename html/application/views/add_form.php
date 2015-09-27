
<form enctype="multipart/form-data" action="<?php echo base_url('/Welcome/add'); ?>" method="POST">
	<fieldset>

	URL:<input type="text" name="url" value="" placeholder="url.com" /><br>

	Item Name: <input type="text" name="itemName" value="" placeholder="Item Name"/><br>

	Item Price: <input type="text" name="itemPrice" value="" placeholder="Price"/><br>

    <input type="submit" name="submit" value="Login"/>

   	</fieldset>
</form>