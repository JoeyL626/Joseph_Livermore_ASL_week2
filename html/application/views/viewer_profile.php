<h2>User Info</h2>
<table width=40% align=left>
<tr>
<th>First Name</th>
<td><?php echo $users[0]->firstName?></td>
</tr>
<tr>
<th>Last Name</th>
<td><?php echo $users[0]->lastName?></td>
</tr>
<tr>
<th>Address</th>
<td><?php echo $users[0]->address?></td>
</tr>
<tr>
<th>City</th>
<td><?php echo $users[0]->city?></td>
</tr>
<tr>
<th>State</th>
<td><?php echo $users[0]->state?></td>
</tr>
<tr>
<th>Zip</th>
<td><?php echo $users[0]->zip?></td>
</tr>
</table>


<br>
<br>
<br>

<table>
<th align=center>Christmas List</th>
<?php
foreach($listItem as $post){

?>
<tr>
<td><?php echo $post->url?></td>
<td><?php echo $post->itemName?></td>
<td><?php echo $post->itemPrice?></td>
</tr>
<?php
}
?>

</table>
