<div class = "container border-container">
	<div class = "row login-page-header" align = "center">
		<div class="col-md-12">
			<h1>ПОГОДА В ЗАПОРОЖЬЕ</h1><br>
		</div>
	</div>
	<div class = "row feedbacks" align = "center">
		<div class="col-md-12">
			<table align="center" border="1" >
			<?php
			$i = 0;
				while (isset($data[$i]))
				{
					
					echo '<tr><td> '.$data[$i][0].'</td><td> '.$data[$i][1].' </td></tr>';
					$i++;
				}
			?>
			</table>
		</div>
	</div>
</div>