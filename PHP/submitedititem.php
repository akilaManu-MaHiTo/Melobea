<?php
	require'database.php';
	
	$coding=$_POST["code"];   
	$catego=$_POST["category"];
	$naam=$_POST["name"];
	$label=$_POST["brand"];
	$state=$_POST["country"];
	$cost=$_POST["price"];
	$condi=$_POST["condition"];
	$des=$_POST["dep"];
	$picture=$_POST["img"];
	
	$sql = "UPDATE newitem SET	bcategory = '$catego',bname = '$naam',bbrand = '$label',bcountry = '$state',bprice = '$cost',bcondition = '$condi',bdep = '$des',bimage = '$picture' WHERE bcode = '$coding'";
	
	if(mysqli_query($mysqli,$sql)){
		echo "<script>alert('Item Update Successfully')'</script>";
		header("Location:editnewitem.php");
		
	}
	else{
		echo "Not Update";
	}
	mysqli_close($mysqli);
?>


