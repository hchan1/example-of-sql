<!-- change server... and rebuild the table -->

<div class="container">
<?php $comment ="";
	bcookie("sender","1");
	bcookie("Reciever",$_GET["RECIEVER"]);
?> 
<form action="<?php echo URL; ?>message/addmessage"  method="POST" enctype="multipart/form-data">
	Comment: <textarea name="Description" rows="5" cols="40"><?php echo $comment;?></textarea>
  
	  <br><br>
	<input type="submit" name="submit_add_message" value="click">  
</form>
<table>
	<thead style="background-color: #ddd; font-weight: bold;">
        	<tr>
                	<td>Id</td>
                	<td>sender id</td>
                	<td>reciever id</td>
                	<td>message</td>
                	<td>Delete</td>
                	<td>EDIT</td>
           	 </tr>
        </thead>
	<tbody>
		<h1>	 message :</h1>
                <?php foreach ($entries as $entry) { ?>
                    	<tr>
                        	<td><?php if (isset($entry->ID)) echo htmlspecialchars($entry->ID, ENT_QUOTES, 'UTF-8'); ?></td>
                 		<td><?php if (isset($entry->Sender_ID)) echo htmlspecialchars($entry->Sender_ID, ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php if (isset($entry->Reciever_ID)) echo htmlspecialchars($entry->Reciever_ID, ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php if (isset($entry->message)) echo htmlspecialchars($entry->message, ENT_QUOTES, 'UTF-8'); ?></td>

		    	</tr>
                <?php } ?>
       </tbody>
         
</table>
<!-- add song form -->
</div>
