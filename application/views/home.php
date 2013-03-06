<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="Mani" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	</head>

	<body>
		<div>
			<header>
				<h1>index</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
			</nav>
			<div id="file_upload">
			<form method="post" action="" id="upload_file">
			  <label for="userfile">File</label>
			  <input type="file" name="userfile" id="userfile" size="20" />
			  <input type="submit" name="submit" id="submit" />
			</form>
			</div>
			<div>
				<img src="" id="profile_pic" />
			</div>
			<div id="form_panle">
			<form id="resume_form" method="post" action="<?php echo base_url('preview'); ?>">
					<div>
						<input class="formAtrr" type="text" name="name" placeholder="Name"/>
					</div>
					<div>
						<input type="hidden" name="img" id="img" value="" />
					</div>
					<div>
						<input class="formAtrr" type="email" name="email" placeholder="Email"/>
					</div>
					<div>
						<input class="formAtrr" type="number" name="mobile" placeholder="Mobile"/>
					</div>
					<div>
						<textarea class="formAtrr" name="address" placeholder="Address"></textarea>
					</div>
					<div>
						<label>Experience : </label>
						<input class="formAtrr" type="text" name="experience" placeholder="Experience" />
					</div>
					<div>
						<label>Objectives</label>
					</div>
					<div>
						<ul id="fromObj">
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
						</ul>
						<div id="addObj">Add</div>
					</div>
					<div>
						<input type="submit" />
					</div>
			</form>
			</div>
			<footer>
				<p>
					&copy; Copyright  by Mani
				</p>
			</footer>
		</div>
	</body>
</html>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>
		<script>
			$(document).ready(function()
			{
				 $('#upload_file').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'./upload/upload_file/',
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         data        : {
            'title'           : $('#title').val()
         },
         success  : function (data, status)
         {
            if(data.status != 'error')
            {
				$('#profile_pic').attr('src',data.imgUrl);
				$('#img').val(data.fname);
               //$('#files').html('<p>Reloading files...</p>');
              // refresh_files();
               //$('#title').val('');
            }
            alert(data.msg);
         }
      });
      return false;
   });
   $('#addObj').click(function()
				{
					$('#fromObj').append('<li><textarea class="objectives" name="objectives[]" placeholder="objective"></textarea></li><span class="removeObj" >Remove</span>');
					$('.removeObj').click(function(){
					$(this).prev().remove();
					$(this).remove();
					});
				});
	$('.removeObj').click(function(){
					$(this).prev().remove();
					$(this).remove();
					});	
			});
		</script>
		<a href="home/logout">Logout</a>
