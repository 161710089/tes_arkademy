	<!DOCTYPE html>
<html>
<head>
<style>
	body {
		font-family: Airbnb Cereal App;
	}
	.input_search{
		width:100% !important;
		background-color:#717171 !important;
	}

	.btn-arka{
		/*width:80% !important;*/
		padding:6px 30px !important;
	}

	.table-modal-arka{
		margin:0 50px !important;
		width: 80% !important;
		border-top: none !important;
	}

	.table-modal-arka>tbody>tr>td{
		border-top: none !important;
	}

	
	.table-arka {
	   border-collapse:separate !important;
	    border:solid #e6e6e6 1px !important;
	    border-radius:6px !important;
	    overflow: hidden;
	    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
	}

	.table-arka>thead{	
	  	background-color: #ed9d2c !important; 
	  	color: white;

		
	}

	.table-arka>tbody{
		background: #FFFFFF;
		box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
	}



	.input-arka{
		border-top:none !important;
		border-right:none !important;
		border-left:none !important;
		border-bottom:5px solid #000;
		box-shadow:none !important;
		
	}

	.select-arka{
		border-top:none !important;
		border-right:none !important;
		border-left:none !important;
		border-bottom:5px solid #000;
		box-shadow:none !important;
	}

	.action-edit{
		font-size:20px;
		color:#7bea93;
	}

	.action-delete{
		font-size:20px;
		color:#ff7b7b;
	}

	.navbar-header>img{
		min-height:45px;
		max-height:45px;
		min-width:80px;
		max-width:80px;

	}

		

</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     <img src="gambar/arka.png">
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="navbar-form">
      	<div class="col-md-10">
          	<input type="text" class="form-control input_search" placeholder="Search" id="search">
        </div>
        <div class="col-md-1">
        	<button type="button" onClick="modal()"  class="btn btn-warning btn-arka" id="add-arka" >ADD</button>
      	</div>
      </div>
    </div>
  </div>
</nav>

<div class="container">
	<div class="row">
		<table class="table table-arka">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Cashier</th>
					<th class="text-center">Product</th>
					<th class="text-center">Category</th>
					<th class="text-center">Price</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody id="tbody">
				<?php
				include 'koneksi.php';
				$no = 1;
				$data = mysqli_query($koneksi,"
							SELECT 	a.id,
								   	c.name as cashier, 
								   	a.name as product,
								   	b.name as category, 
								   	a.price    
								   	FROM product a 
									inner join category b on a.id_category = b.id
									inner join cashier c on a.id_cashier = c.id");
				foreach ($data as $datas) {?>
					<tr>
						<td  ><?= $no++ ?></td>
						<td  ><?= $datas['cashier'] ?></td>
						<td  ><?= $datas['product'] ?></td>
						<td class="text-center" ><?= $datas['category'] ?></td>
						<td class="text-center" >
							<?= 'Rp. '. number_format($datas['price'], 2, ',', '.'); ?>	
						</td>
						<td class="text-center"> 
							<a href="#" class="action-edit">
								<span class="glyphicon glyphicon-edit" 
									onClick="modal(<?= $datas['id'] ?>)" aria-hidden="true">	
								</span>
							</a>
							<a href="#" class="action-delete">
								<span class="glyphicon glyphicon-trash" 
								onClick="delete_data(<?= $datas['id'] ?>)"
								 aria-hidden="true"></span>
							</a>
						</td>
					</tr>
				<?php } ?>
			
			</tbody>
		</table>
	</div>
</div>

</body>
</html>

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
    </div>
  </div>
</div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
 <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>	

<script>
	function modal(param = 0){
			

		var target = "soal3B/modal.php";
		var data = {
						"id_product" : param,
					}
		$.post(target, data, function(response){
			console.log(response);
			var content = $('#modal').find('.modal-content');
			$(content).html(response);
			$('#modal').modal('show');
		}).fail((xhr) => {
	      console.log(xhr)
	    });
			// $('#modal').modal('show');
	}

	function delete_data(param = 0){
		var target = "soal3B/delete_action.php";
		var data = {
						"id_product" : param,
					}
		$.post(target, data, function(response){
			console.log(response);
			swal({
			  title: 'Data '+response+' ID #'+param,
			  text: 'Berhasil Dihapus!',
			  type: 'success'
			});
		}).fail((xhr) => {
	      console.log(xhr)
	    });
			// $('#modal').modal('show');
	}

	$("#search").on('keyup change', function(){
		var val = $(this).val();
		var target = "search.php";
		var data = {
						"search" : val,
					}
		$.post(target, data, function(response){
			console.log(response);
			$('.table-arka #tbody').html(response);
		}).fail((xhr) => {
	      console.log(xhr)
	    });
	})

</script>