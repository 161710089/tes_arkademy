<?php 

	include 'koneksi.php';
	$search = $_POST['search'];

	$product = mysqli_query($koneksi,"SELECT 	a.id,
								   	c.name as cashier, 
								   	a.name as product,
								   	b.name as category, 
								   	a.price    
								   	FROM product a 
									inner join category b on a.id_category = b.id
									inner join cashier c on a.id_cashier = c.id 
									where c.name LIKE '%".$search."%'
									OR a.name LIKE '%".$search."%'
									OR b.name LIKE '%".$search."%'
									");
	if(!empty(mysqli_fetch_array($product))){
		$render_html = "";
		$no =1;
		foreach ($product as $datas) {
			$render_html .= "<tr>
						<td  >".$no++." </td>
						<td  >".$datas['cashier']." </td>
						<td  >".$datas['product']." </td>
						<td class='text-center' >".$datas['category']." </td>
						<td class='text-center' >".$datas['price']." </td>
						<td class='text-center'> 
							<a href='#'' class='action-edit'>
								<span class='glyphicon glyphicon-edit' 
									onClick='modal(".$datas['id'].")' aria-hidden='true'>	
								</span>
							</a>
							<a href='#'' class='action-delete'>
								<span class='glyphicon glyphicon-trash' 
								onClick='delete_data(".$datas['id'].")'
								 aria-hidden='true'></span>
							</a>
						</td>
					</tr>";
		}
		echo $render_html;
	}else{
		echo "<tr>
				<td colspan='6' class='text-center'>Data tidak ditemukan!</td>
			  </tr>";
	}
			
?>