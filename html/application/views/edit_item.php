<form action="<?php echo base_url('/Welcome/edit'); ?>" align=center style="margin:0 auto" method="POST">
		
		<input type="hidden" name="itemId" value="<?php echo $listItem[0]->itemId;?>" />
		<input type="hidden" name="oitemName" value="<?php echo $listItem[0]->itemName;?>" />
		<input type="hidden" name="oitemPrice" value="<?php echo $listItem[0]->itemPrice;?>" />
		<input type="text" name="itemName" value="" placeholder="<?php echo $listItem[0]->itemName;?>"/>
		<input type="text" name="itemPrice" value="" placeholder="<?php echo $listItem[0]->itemPrice;?>"/>
		<input type="submit" name="submit" value="Update User"/>
	
</form>