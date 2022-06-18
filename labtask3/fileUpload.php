<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://www.pakainfo.com">pakainfo.com</a>
	</div>
	</nav>
	<div class="col-sm-3"></div>
	<div class="col-sm-6 well">
		<h3 class="text-primary">Simple PHP - Simple Image Upload - pakainfo</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-sm-2"></div>
		<div>
			<form method="POST" action="live_save_upload.php" enctype="multipart/form-data">
				<label>Name:</label>
				<input type="text" name="name"/>
				<div style="float:right;">
					<div id = "picture_prev_display" style = "width:150px; height :150px; border:1px solid #000;">
						<center id = "myimg">[Photo]</center>
					</div>
					<input type = "file" id = "mypicImg" name = "mypicImg" />
				</div>	
				<div style="clear:both;"></div>
				<br/>
				<center><button class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-save"></span> Save</button></center>
			</form>
		</div>
		<br />
		<div class="col-sm-12">
			<table class="pakainfo table table-bordered exlive">
				<thead>
					<tr>
						<th>User Name</th>
						<th>Photo</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						require 'dbcon.php';
						$squry = $dbcon->query("SELECT * FROM `students`") or die(mysqli_errno());
						while($retrive = $squry->retrive_array()){
 
 
					?>
					<tr>
						<td><?php echo $retrive['name']?></td>
						<td><center><img src="<?php echo "upload/".$retrive['mypicImg']?>" width="100px" height="100px"></center></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script src="pakainfo/js/jquery-3.2.1.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$myimg = $('<center id = "myimg">[Photo]</center>');
		$("#mypicImg").change(function(){
			$("#myimg").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$myimg.appendTo("#picture_prev_display");
			}
			if(/^image/.test(files[0].type)){
				var dreadr = new FileReader();
				dreadr.readAsDataURL(files[0]);
				dreadr.onloadend = function(){
					$pic.appendTo("#picture_prev_display");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>