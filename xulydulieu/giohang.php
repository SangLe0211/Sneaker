<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	* 
	*/
	class giohang
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function get_product_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_giohang WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_quantity_Cart($proId,$cartId, $quantity)
		{
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$proId = mysqli_real_escape_string($this->db->link, $proId);

			$query_product = "SELECT * FROM tbl_sanpham WHERE productId = '$proId' ";
			$result_product = $this->db->select($query_product)->fetch_assoc();
			if($quantity<$result_product['product_remain']){
				$query = "UPDATE tbl_giohang SET quantity = '$quantity' WHERE cartId = '$cartId'";
				$result = $this->db->update($query);
				if ($result) {
					
					
					header('Location:giohang.php');
					
					
				}else {
					$msg = "<span class='erorrs'> Cập nhật số lượng sản phẩm KHÔNG thành công</span> ";
					return $msg;
				}
			}else{
				$msg = "<span class='erorrs'> Số lượng ".$quantity." bạn đặt quá số lượng, chúng tôi chỉ còn ".$result_product['product_remain']." cái</span> ";
				return $msg;
			}

		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_giohang WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span class='erorrs'>Sản phẩm đã được xóa thành công</span>";
				return $msg;
			}else{
				$msg = "<span class='erorrs'>Sản phẩm đã được xóa</span>";
				return $msg;
			}
		}

		public function check_cart($customer_id)
		{
			
			$query = "SELECT * FROM tbl_giohang WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function check_donhang($customer_id)
		{
			
			$query = "SELECT * FROM tbl_donhang WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function check_cart_yeuthich($customer_id)
		{
			
			$query = "SELECT * FROM tbl_ds_yeuthich WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function check_order($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_donhang WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		// public function del_all_data_cart()
		// {
		// 	$sId = session_id();
		// 	$query = "DELETE FROM tbl_giohang WHERE sId = '$sId' ";
		// 	$result = $this->db->select($query);
		// 	return $result;
		// }
		public function del_compare($customer_id){
			$sId = session_id();
			$query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id'";
			$result = $this->db->delete($query);
			return $result;
		}
		public function del_all_data_cart()
		{
			$sId = session_id();
			$query = "DELETE FROM tbl_giohang WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_data_cart1()
		{
			$sId = session_id();
			$query = "DELETE FROM tbl_giohang WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertOrder($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_giohang WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					// $sId = $result['sId'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO tbl_donhang(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}
		public function getAmountPrice($customer_id)
		{
			$query = "SELECT price FROM tbl_donhang WHERE customer_id = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT * FROM tbl_donhang WHERE customer_id = '$customer_id' ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function get_inbox_cart()
		{
			$query = "SELECT * FROM tbl_donhang ORDER BY `tbl_donhang`.`id` DESC";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		
		public function shifted($id,$proid,$qty,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$proid = mysqli_real_escape_string($this->db->link, $proid);
			$qty = mysqli_real_escape_string($this->db->link, $qty);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query_select = "SELECT * FROM tbl_sanpham WHERE productId='$proid'";
			$get_select = $this->db->select($query_select);

			if($get_select){
				while($result = $get_select->fetch_assoc()){
					$soluong_new = $result['product_remain'] - $qty;
					$qty_soldout = $result['product_soldout'] + $qty;

					$query_soluong = "UPDATE tbl_sanpham SET

					product_remain = '$soluong_new',product_soldout = '$qty_soldout' WHERE productId = '$proid'";
					$result = $this->db->update($query_soluong);
				}
			}

			$query = "UPDATE tbl_donhang SET status = '1' WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Update Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
				return $msg;
			}
		}
		
		public function del_shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_donhang 
					  WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> DELETE Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> DELETE Order NOT Succesfully</span> ";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_donhang SET

			status = '2'

			WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			return $result;
		}
		public function add_to_cart($id, $quantity)
		{
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM tbl_z WHERE productId = '$id' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];
			if($result['product_remain']>$quantity){
			
				$query_insert = "INSERT INTO tbl_giohang(productId,productName,quantity,sId,price,image) VALUES('$id','$productName','$quantity','$sId','$price','$image' ) ";
				$insert_cart = $this->db->insert($query_insert);
				if($result){
					header('Location:cart.php');
				}else {
					header('Location:404.php');
				}
			}else{
				$msg = "<span class='erorr'> Số lượng ".$quantity." bạn đặt quá số lượng chúng tôi chỉ còn ".$result['product_remain']." cái</span> ";
				return $msg;
			}
			

		}
	
	

	
	
	
	
	
		
		
		
	}
 ?>