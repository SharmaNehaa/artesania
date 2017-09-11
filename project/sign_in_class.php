
<?php
	public class sign_in_class{
		public function signin(){
			session_start();
			$con=mysqli_connect("localhost","root","","artesania");
			if(!$con){
				mysqli_connect_error("Connection error.".mysqli_connect_error());
			}
			echo '
				<div id="sign_in_box">
					<h3 align="center">LOGIN</h3>
					<hr>
							<form action="signInProcess.php" method="post" id="orange">
					
							<table align="center" id="table">
								<tr>
									<td><input type="text" name="username" placeholder="Username"></input></td>
								</tr>
								<tr>
									<td><input type="password" name="pwd" placeholder="Password"></input></td>
								</tr>
								
								<tr>
									<td align="center"><input type="submit" value="LOG IN" class="button" ></input></td>
								</tr>

							</table>
				
					</div>
			';
		}
	}
	$obj= new login1;
	$obj->login();
?>

