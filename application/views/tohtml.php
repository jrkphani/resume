<?php
//will get all post data as key => value; 
extract($_POST);
?>				<div>
	<?php if($img!="")
	{ ?>
	<img src="<?php if($img!="") echo base_url('temp/img').'/'.$img; ?>" />
	<?php }?>
				</div>
				<div id="top_left">
					<div>
						<?php echo $name; ?>
					</div>
					<div>
						<?php echo $email; ?>
					</div>
					<div>
						<?php echo $mobile; ?>
					</div>
				</div>
				<div id="top_right">
					<div>
						<?php echo nl2br($address); ?>
					</div>
				</div>
					<div>
						<label>Experience : </label>
						<?php echo $experience; ?>
					</div>
					<div>
						<label>Objectives</label>
					</div>
					<div>
						<ul>
							<?php
							foreach($objectives as $objective)
							{
								echo '<li>'.nl2br($objective).'</li>';
							}
							?>
						</ul>
					</div>
