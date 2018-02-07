<?php
if (isset($_POST['home'])) {
    header('location: index.php');
}
?>
<div class="container">
			<div class="header">
				<h3>
					COMP207 - Register here for a practical slot
				</h3>
			</div>
			<br/><br/><br/><br/>
			<form method="post" action="success.php">
				<table class="inputarea" id="tblSuccess"> 
					<tr>
						<th class="msgpos">
							<div class="my-notify-success">
									You have successfully registered. Thank you.
							</div>
						</th>
					</tr>
					<tr>
						<th style="text-align:center;">					
							<button type="submit" class="btn" name="home" value="">Home</button>
						</th>
					</tr>
				</table>
			</form>
		</div>

