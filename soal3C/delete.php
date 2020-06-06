<?php 
	include '../koneksi.php';
	$id_product = $_POST['id_product'];
	$product2 = mysqli_query($koneksi,"SELECT a.*,b.name as cashier from product a 
										inner join cashier b on b.id = a.id_cashier
										where a.id = $id_product ");
	
	$product = mysqli_query($koneksi,"DELETE  from product where id = $id_product ");
	
	
	foreach ($product2 as $data_product) {
		$cashier = $data_product['cashier'];
	}
	
	if($product){
		echo $cashier;
	}
				
?>