<?php 			
	include '../koneksi.php';
	$id_product = $_POST['id_product'];
	if($id_product == 0){
		$tittle = "ADD";
	}else{
		$tittle = "Edit";
	}
	
?>
<form action="soal3C/action.php" method="POST"> 	
	<input type="hidden" value="<?= $id_product ?>" name="id_product">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title"><?= $tittle ?></h4>
	</div>
	<div class="modal-body">
		<?php if($id_product == 0){ $button = "Add"; ?>
		  	<table class="table table-modal-arka">
			  	<tr>
			  		<td>
			  			<select name="id_cashier" class="form-control select-arka">
			  				<option value="" selected disabled>-Pilih Cashier-</option>
			  				<?php
							$data = mysqli_query($koneksi,"SELECT * from cashier");
							// print_r($data);
							// die();
								foreach ($data as $datas) {?>
			  					<option value="<?= $datas['id'] ?>"><?= $datas['name'] ?></option>
			  				<?php } ?>
			  			</select>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>
			  			<select name="id_category" class="form-control select-arka">
			  				<option value="" selected disabled>-Pilih Category-</option>
			  				<?php
							$data2 = mysqli_query($koneksi,"SELECT * from category");
							// print_r($data);
							// die();
								foreach ($data2 as $datas2) {?>
			  					<option value="<?= $datas2['id'] ?>"><?= $datas2['name'] ?></option>
			  				<?php } ?>
			  			</select>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td><input name="product" type="text" placeholder="Nama Barang" class="form-control input-arka"></td>
			  	</tr>
			  	<tr>
			  		<td><input name='price' type="text" placeholder="Harga" class="form-control input-arka"></td>
			  	</tr>

		  	</table>
		 <?php }elseif($id_product != 0){
		 	$button = "Edit"; ?>
		 	<?php
				$product = mysqli_query($koneksi,"SELECT * from product where id = $id_product");
				foreach ($product as $data_product) {
					$id_cashier = $data_product['id_cashier'];
					$id_category = $data_product['id_category'];
					$product = $data_product['name'];
					$price = $data_product['price'];

				}


				// print_r($firstrow);
				// die();
			?>
		 	<table class="table table-modal-arka">
			  	<tr>
			  		<td>
			  			<select name="id_cashier" class="form-control select-arka">
			  				<option value="" selected disabled>-Pilih Cashier-</option>
			  				<?php
							$data = mysqli_query($koneksi,"SELECT * from cashier");
							// print_r($data);
							// die();
								foreach ($data as $datas) {?>
			  					<option value="<?= $datas['id'] ?>" 
			  						<?php echo ($datas['id'] == $id_cashier) ? 'selected' : ''; ?> >
			  						<?= $datas['name'] ?></option>
			  				<?php } ?>
			  			</select>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>
			  			<select name="id_category" class="form-control select-arka">
			  				<option value="" selected disabled>-Pilih Category-</option>
			  				<?php
							$data2 = mysqli_query($koneksi,"SELECT * from category");
							// print_r($data);
							// die();
								foreach ($data2 as $datas2) {?>
			  					<option value="<?= $datas2['id'] ?>" 
			  						<?php echo ($datas2['id'] == $id_category) ? 'selected' : ''; ?> ><?= $datas2['name'] ?></option>
			  				<?php } ?>
			  			</select>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td><input  name="product" type="text" placeholder="Nama Barang" value="<?= $product ?>" class="form-control input-arka"></td>
			  	</tr>
			  	<tr>
			  		<td><input name="price" type="text" placeholder="Harga" value="<?= $price ?>" class="form-control input-arka"></td>
			  	</tr>

		  	</table>

		 <?php } ?>
	</div>
	<div class="modal-footer">
	  <button type="submit" name="add" class="btn btn-warning btn-arka" ><?= $button ?></button>
	</div>
</form>
