 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
 <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>	
 <?php
 	if(isset($_POST['add'])){
        include_once("../koneksi.php");

        $id_product = $_POST['id_product'];

 		$id_category = $_POST['id_category'];
        $id_cashier = $_POST['id_cashier'];
        $product = $_POST['product'];
        $price = $_POST['price'];

        if($id_product == 0){

    	    $result = mysqli_query($koneksi, "INSERT INTO 
    	    	product 
    	    	VALUES(NULL, '$product','$price','$id_category','$id_cashier')") 
    	    	or die(mysqli_error());

        }else{
        	// print_r(array($id_category,$id_cashier,$product,$price));
        	// die();
 	       $result = mysqli_query($koneksi, "UPDATE product 
 	       		SET id_category='$id_category', 
 	       			id_cashier='$id_cashier',
 	       			name='$product', 
 	       			price = '$price' 
 	       			where id = '5' ") 
 	       			or die(mysqli_error());
        }
    	if($result){
			
			echo "<script>
					setInterval(window.location.href='/tes/soal3c.php?status=success', 1200);
				</script>";
			
		}else{
			
			echo "<script>
					setInterval(window.location.href='/tes/soal3c.php?status=error', 1200);
				</script>";
			
		}
	 
	}else{	//jika tidak terdeteksi tombol tambah di klik
	 
		//redirect atau dikembalikan ke halaman tambah
		echo '<script>window.history.back()</script>';
	 
	}
    
 ?>

	
	
