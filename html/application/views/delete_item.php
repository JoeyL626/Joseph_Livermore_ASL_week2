<table width=40% align=left>
<tr>
<th>Url</th>
<td><?php echo $listItem[0]->url?></td>
</tr>
<tr>
<th>Item Name</th>
<td><?php echo $listItem[0]->itemName?></td>
</tr>
<tr>
<th>Item Price</th>
<td><?php echo $listItem[0]->itemPrice?></td>
</tr>
</table>
<form action="<?php echo base_url('/Welcome/delete'); ?>" align=center method="POST">
		<p>Are you sure you want to this item?</p><br>
		<input type="hidden" name="itemId" value="<?php echo $listItem[0]->itemId?>" />
		<input type="submit" name="submit" value="Delete"/>
</form>
