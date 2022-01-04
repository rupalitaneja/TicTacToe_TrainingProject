
<?php

include 'config.php';

$sql= "SELECT u.*, u.win/u.played as KDRatio FROM users u ORDER BY KDRatio DESC LIMIT 10";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>User Details</title>	
	<link rel="stylesheet" type="text/css" href="css/apstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class='content'>
	
	<div class="buttonnn">
	<a href="homepage.php" ><button class="btn"><i class="fa fa-home" style="font-size:48px;color:black"></i></button></a>
		</div>
		<h1>LEADER BOARD</h1>
		<br>	
	<section>
		<table>
			<tr>
				<th>Username</th>
				<th>email</th>
				<th>Contact</th>
				<th>Score</th>
				<th>Total Played</th>
				<th>Status</th>
			</tr>
			
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>	
				<td><?php echo $rows['username'];?></td>
				<td><?php echo $rows['email'];?></td>	
				<td><?php echo $rows['number'];?></td>
				<td><?php echo $rows['win'];?></td>
				<td><?php echo $rows['played'];?></td>
				<td><?php
				if ($rows['status']==0)
                {
                    echo "<img src='offline.png' width=17px height=17px />";
                }
                else if ($rows['status']==1)
                {
                    echo "<img src='online1.png' width=21px height=21px />";
                }
                ?></td>
				
			</tr>
			<?php
				}
			?>
		</table>
	</section>
			</div>
</body>

</html>
