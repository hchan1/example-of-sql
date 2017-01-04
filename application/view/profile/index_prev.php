    <script>
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("mytable").deleteRow(i);
}

  $(document).ready(function () {
      $('.editbtn').click(function () {
          var currentTD = $(this).parents('tr').find('td');
          if ($(this).html() == 'Edit') {                  
              $.each(currentTD, function () {
                  $(this).prop('contenteditable', true)
              });
          } else {
             $.each(currentTD, function () {
                  $(this).prop('contenteditable', false)
              });
          }

          $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')

      });

  });
</script>

<div class="container">
	<!-- <hr style="border:3 double #987cb9" width="200%" color=#987cb9 SIZE="7"> -->
	<div class="row clearfix">
		<div class="col-md-6 column pull-right">
			<dl class="dl-horizontal">
				<dd><br><br><br>
					<?php if (isset($_SESSION["image"])){ echo '<img alt="Profile Photo" src="data:image/jpeg;base64,'. base64_encode($_SESSION["image"]) .'" />';}
					else echo '<img alt="140x140" style="width: 124px; height: 124px;" src="http://www.clker.com/cliparts/B/R/Y/m/P/e/blank-profile-hi.png" class="img-thumbnail" />' ?>
				</dd>
				<br>
				<dd>
					<a id="modal-525046" href="#modal-container" role="button" class="myButton" data-toggle="modal">Edit Profile</a>
				</dd>
			</dl>
		</div>
		<div class="col-md-6 column pull-left">
			<dl class="dl-horizontal">
			<br><br>
			<br>
				<dt>
					<font size="4">Account Id:</font>
				</dt>
				<dd>
					<font size="4"><?php echo $_SESSION["id"]; ?></font>
				</dd>
				<hr>
				<dt>
					<font size="4">Name:</font>
				</dt>
				<dd>
					<font size="4"><?php echo $_SESSION["fullname"]; ?></font>
				</dd>
				<hr>
				<dt>
					<font size="4">Email:</font>
				</dt>
				<dd>
					<font size="4"><?php echo $_SESSION["email"]; ?></font>
				</dd>
			</dl>
		</div>
	</div>
</div>
				<!-- Edit profile modal: BEGIN -->
				<div class="modal fade" id="modal-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Personal Information
							</h4>
						</div>
				<div class="modal-body">
					<form action="<?php echo URL; ?>user/update" method="POST">
					<div class="form-group">
					 <label for="Name">First Name</label><input type="text" class="form-control" name='firstname' value="<?php echo $_SESSION["firstname"]; ?>" />
					</div>
					<div class="form-group">
					 <label for="Address">Last Name</label><input type="text" class="form-control" name='lastname' value="<?php echo $_SESSION["lastname"]; ?>" />
					</div>
					<div class="form-group">
					 <label for="Phone">Email</label><input type="text" class="form-control" name="email" value="<?php echo $_SESSION["email"]; ?>" />
					</div>
						<div class="form-group">
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
							<input type="submit" name="update_data" class="btn btn-primary" value="Save" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit profile modal: END -->


	<hr>
	<h1 class="text-left">My Listings<small>(<?php echo $listings_count; ?>)</small><h1>
	<hr>


	<div class="row clearfix">
		<div class="col-md-12 column">
		<div class="table-responsive">
			<table id="mytable" class="table table-bordred table-striped">
				<thead>
				<th>#</th>
				<th>Street Address</th>
				<th>City</th>
				<th>Zip</th>
				<th>Bedroom</th>
				<th>Bathroom</th>
				<th>Price</th>
				<th>Edit</th>

				<th>Delete</th>
				</thead>

				<tbody>
				<?php foreach ($listings as $entry) { ?>
				<tr class="clickable-row" id="<?php echo $entry->id?>" data-href="<?php echo URL."listing/detail?entry=".$entry->id; ?>">
					<td><?php echo $entry->id?></td>
					<td><?php if (isset($entry->address))
							echo htmlspecialchars($entry->address, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php if (isset($entry->city))
							echo htmlspecialchars($entry->city, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php if (isset($entry->zip))
							echo htmlspecialchars($entry->zip, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php if (isset($entry->bedroom))
							echo htmlspecialchars($entry->bedroom, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php if (isset($entry->bathroom))
							echo htmlspecialchars($entry->bathroom, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?php if (isset($entry->price))
							echo "$".htmlspecialchars($entry->price, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
					<td><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
				</tr>
				<?php } ?>
				</tbody>

			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Apartment Detail</h4>
      </div>
   <div class="modal-body">

        <div class="form-group">
        <input class="form-control " type="text" placeholder="Street Address">
        </div>

        <div class="form-group">
        <input class="form-control " type="text" placeholder="City">
        </div>

        <div class="form-group">
        <input class="form-control " type="text" placeholder="Zip">
        </div>

        <div class="form-group">
        <input class="form-control "  type="text" placeholder="Bedroom">
 		</div>
       
        <div class="form-group">
        <input class="form-control "  type="text" placeholder="Bathroom">
        </div>
        
        <div class="form-group">
		<input class="form-control" type="text" placeholder="Price">     
        </div>
    
     </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" onclick="#" ></span> Update</button>
      </div>
   </div>

  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
  		  <div class="modal-content">
        	  <div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
       			 <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      		</div>
          <div class="modal-body">
	<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
      </div>
        <div class="modal-footer ">
        	<button type="button" class="btn btn-success"  onclick="#" data-dismiss="modal"  ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      	</div>
        </div>
	</div>
</div>


<script>
	jQuery(document).ready(function($) {
		$(".clickable-row").click(function() {
			window.document.location = $(this).data("href");
		});
	});
</script>