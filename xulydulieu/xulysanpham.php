
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	/**
	* 
	*/
	class xulysanpham
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function insert_product($date,$files){
			
			$productName = mysqli_real_escape_string($this->db->link, $date['productName']);
			$product_code = mysqli_real_escape_string($this->db->link, $date['product_code']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $date['productQuantity']);
			$category = mysqli_real_escape_string($this->db->link, $date['category']);
			$brand = mysqli_real_escape_string($this->db->link, $date['brand']);
			$product_desc = mysqli_real_escape_string($this->db->link, $date['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $date['price']);
			$type = mysqli_real_escape_string($this->db->link, $date['type']);
			 //mysqli gọi 2 biến. (tendanhmuc and link) biến link -> gọi conect db từ file db
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if(isset($_FILES['images'])){
				$files = $_FILES['images'];
				$file_names = $files['name'];
				// var_dump($files['tmp_name']); die();
				foreach ($file_names as $key => $value){
					move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
				}
			}
			if($productName == "" || $product_code =="" || $productQuantity == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == ""){
				$alert = "<span class='error'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_sanpham(productName,product_code,product_remain,productQuantity,id_danhmuc,brandId,product_desc,price,type,image) VALUES('$productName','$product_code','$productQuantity','$productQuantity','$category','$brand','$product_desc','$price','$type','$unique_image') ";
				$result = $this->db->insert($query);
				
				$id_pro = mysqli_insert_id($this->db->link);

				foreach ($file_names as $key => $value){
					mysqli_query($this->db->link, "INSERT INTO tbl_image_products(id_product, image) VALUE ('$id_pro', '$value')");
				}
				if($result){
					$alert = "<span class='TB_thanhcong'>Thêm sản phẩm thành công</span>";
					return $alert;
					
				}else {
					$alert = "<span class='TT_loi'>Thêm sản phẩm thất bại/span>";
					return $alert;
				}
			}
		}
		public function insert_slider($date,$files)
		{
			$sliderName = mysqli_real_escape_string($this->db->link, $date['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $date['type']);
			 //mysqli gọi 2 biến. (tendanhmuc and link) biến link -> gọi conect db từ file db
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					
					$query = "INSERT INTO tbl_banner(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='TB_thanhcong'>Thêm banner thành công</span>";
						return $alert;
						
					}else {
						$alert = "<span class='TT_loi'>Thêm banner thất bại/span>";
						return $alert;
					}
				}
				
				
			}

		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_banner where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_banner order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_admin_list(){
			$query = "SELECT * FROM tbl_admin order by adminId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product_warehouse(){
			$query = 
			"SELECT tbl_sanpham.*, tbl_kho.*

			 FROM tbl_sanpham INNER JOIN tbl_kho ON tbl_sanpham.productId = tbl_kho.id_sanpham
								
			 order by tbl_kho.sl_ngaynhap desc ";

		
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product()
		{
			$query = 
			"SELECT tbl_sanpham.*, tbl_danhmucsp.tendanhmuc, tbl_thuonghieu.brandName

			 FROM tbl_sanpham INNER JOIN tbl_danhmucsp ON tbl_sanpham.id_danhmuc = tbl_danhmucsp.id_danhmuc
								INNER JOIN tbl_thuonghieu ON tbl_sanpham.brandId = tbl_thuonghieu.brandId
			 order by tbl_sanpham.productId desc ";

			// $query = "SELECT * FROM tbl_sanpham order by productId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_banner SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id)
		{
			$query = "DELETE FROM tbl_banner where sliderId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Slider Deleted Not Success</span>";
				return $alert;
			}
		}
		public function del_admin($id)
		{
			$query = "DELETE FROM tbl_admin where adminId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Slider Deleted Not Success</span>";
				return $alert;
			}
		}
		public function update_quantity_product($data,$files,$id){
			$product_more_quantity = mysqli_real_escape_string($this->db->link, $data['product_more_quantity']);
			$product_remain = mysqli_real_escape_string($this->db->link, $data['product_remain']);
			$product_remains = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			
			if($product_more_quantity == ""){

				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
				$qty_total = $product_more_quantity + $product_remain;
				$qty_totals = $product_more_quantity + $product_remains;

				
				$query = "UPDATE tbl_sanpham SET product_remain = '$qty_total', productQuantity = '$qty_totals' WHERE productId = '$id'";
				}
				$query_warehouse = "INSERT INTO tbl_kho(id_sanpham,sl_nhap) VALUES('$id','$product_more_quantity') ";
				$result_insert = $this->db->insert($query_warehouse);
				$result = $this->db->update($query);

				if($result){
					$alert = "<span class='TB_thanhcong'>Thêm số lượng thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='TT_loi'>Thêm số lượng không thành công</span>";
					return $alert;
				}
				
		}
		public function update_product($data,$files,$id){
	
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$product_code = mysqli_real_escape_string($this->db->link, $data['product_code']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if(isset($_FILES['images'])){
				$files = $_FILES['images'];
				$file_names = $files['name'];
				
				if(!empty($file_names[0])){
					mysqli_query($this->db->link, "DELETE FROM tbl_image_products WHERE id_product = '$id'");
					foreach ($file_names as $key => $value){
						move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
					}
					foreach ($file_names as $key => $value){
						mysqli_query($this->db->link, "INSERT INTO tbl_image_products(id_product, image) VALUE ('$id', '$value')");
						
						
					}
				}
			}

			if( $productName=="" || $product_code =="" || $productQuantity=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 519200) {

		    		 $alert = "<span class='success'>Kích thước ảnh quá lớn</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE tbl_sanpham SET
					productName = '$productName',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					id_danhmuc = '$category', 
					type = '$type', 
					price = '$price', 
					image = '$unique_image',
					product_desc = '$product_desc'
					WHERE productId = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_sanpham SET productName = '$productName',product_code = '$product_code',productQuantity = '$productQuantity',brandId = '$brand',

					id_danhmuc = '$category', type = '$type', price = '$price', product_desc = '$product_desc'WHERE productId = '$id'";
					
				}
				$result = $this->db->update($query);
				
				if($result){
					
					$alert = "<span class='TB_thanhcong'>Sản phẩm Updated thành công</span>";
					return $alert;
					
				}else{
					$alert = "<span class='TT_loi'>Sản phẩm Updated không thành công</span>";
					return $alert;
				}
				
			}

		}
		public function del_product($id)
		{
			$query = "DELETE FROM tbl_sanpham where productId = '$id' ";
			
			$result = $this->db->delete($query);
			
			if($result){
				$alert = "<span class='success'>Product Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Product Deleted Not Success</span>";
				return $alert;
			}
		}
		public function del_imgs_product($id)
		{
			$query = "DELETE FROM tbl_image_products where id_product = '$id' ";
			
			$result = $this->db->delete($query);
			
			if($result){
				$alert = "<span class='success'>Product Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Product Deleted Not Success</span>";
				return $alert;
			}
		}
		public function del_wlist($proid,$customer_id)
		{
			$query = "DELETE FROM tbl_ds_yeuthich where productId = '$proid' AND customer_id='$customer_id' ";
			$result = $this->db->delete($query);
			return $result;
		}
		public function getproductbyId($id)
		{
			$query = "SELECT * FROM tbl_sanpham where productId = '$id' ";
			$result = $this->db->select($query);
			// $img_products = "SELECT * FROM tbl_image_products where id_product = '$id'";
			
			return $result;
			
		}		
		//Kết thúc Backend

	

		public function getSan_Pham_moi()
		{
			$query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu ON tbl_sanpham.brandId = tbl_thuonghieu.brandId   order by productId desc LIMIT 10 ";
			// $query = "SELECT * FROM tbl_sanpham where type = '0' order by productId desc LIMIT 10 ";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		public function getSan_Pham_goi_y()
		{
			$query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
			 ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where type = '1' order by productId desc LIMIT 10 ";
			
			$result = $this->db->select($query);
			return $result;
		}
	
		public function get_details($id)
		{
			$query = 
			"SELECT tbl_sanpham.*, tbl_danhmucsp.tendanhmuc, tbl_thuonghieu.brandName

			 FROM tbl_sanpham INNER JOIN tbl_danhmucsp ON tbl_sanpham.id_danhmuc = tbl_danhmucsp.id_danhmuc
							  INNER JOIN tbl_thuonghieu ON tbl_sanpham.brandId = tbl_thuonghieu.brandId
							
			 WHERE tbl_sanpham.productId = '$id'
			 ";

			$result = $this->db->select($query);
			return $result;
		}
		public function get_thuonghieu_nike()
		{
			$query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
			 ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '15' order by productId desc LIMIT 8 ";
			$result = $this->db->select($query);
			return $result;	
		}
		public function get_thuonghieu_adidas()
		{
			$query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
			 ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '16' order by productId desc LIMIT 8 ";
			$result = $this->db->select($query);
			return $result;	
		}
		public function get_thuonghieu_vans()
		{
			$query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
			 ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '18' order by productId desc LIMIT 8 ";
			$result = $this->db->select($query);
			return $result;	
		}
		public function get_thuonghieu_baletiaga()
		{
			$query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
			 ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '17' order by productId desc LIMIT 8 ";
			$result = $this->db->select($query);
			return $result;	
		}
		
		public function get_compare($customer_id)
		{
			$query = "SELECT * FROM tbl_compare where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;	
		}
		public function get_wishlist($customer_id)
		{
			$query = "SELECT * FROM tbl_ds_yeuthich where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertCompare($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);

			if($result_check_compare){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào so sánh</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_sanpham WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if($insert_compare){
						$alert = "<span class='success'>Thêm sản phẩm vào so sánh thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm sản phẩm vào so sánh thất bại</span>";
						return $alert;
					}
			}

		}
		
		public function insertWishlist($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_wlist = "SELECT * FROM tbl_ds_yeuthich WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='them_gio_TB'>Sản phẩm đã tồn tại trong danh sách yêu thích của bạn</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_sanpham WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_ds_yeuthich(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='them_gio_TC'>Thêm sản phẩm vào danh sách yêu thích thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='them_gio_TB'>Thêm sản phẩm vào danh sách yêu thích thất bại</span>";
						return $alert;
					}
			}
		}
		public function insert_admin($date)
		{
			
			$adminName = mysqli_real_escape_string($this->db->link, $date['adminName']);
			$adminEmail = mysqli_real_escape_string($this->db->link, $date['adminEmail']);
			$adminUser = mysqli_real_escape_string($this->db->link, $date['adminUser']);
			$adminPass = mysqli_real_escape_string($this->db->link, md5($date['adminPass']));
			$level = mysqli_real_escape_string($this->db->link, $date['level']);
		
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['imageadmin']['name'];
			$file_size = $_FILES['imageadmin']['size'];
			$file_temp = $_FILES['imageadmin']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($adminName =='' || $adminEmail == "" || $adminUser == "" || $adminPass == "" || $level == ""){
				$alert = "<span class='error'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);

				
				$query = "INSERT INTO tbl_admin(adminName,adminEmail,adminUser,adminPass,level,imageadmin) VALUES('$adminName','$adminEmail','$adminUser','$adminPass','$level','$unique_image') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Product Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Insert Prodcut NOT Success</span>";
					return $alert;
				}
			}
		}
	}
 ?>