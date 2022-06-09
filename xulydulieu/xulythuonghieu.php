
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	* 
	*/
	class xulythuonghieu
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_brand($tenthuonghieu){
			$tenthuonghieu = $this->fm->validation($tenthuonghieu);//gọi ham validation từ file Format để ktra
			$tenthuonghieu = mysqli_real_escape_string($this->db->link, $tenthuonghieu);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($tenthuonghieu)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_thuonghieu(brandName) VALUE ('".$tenthuonghieu."')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='TB_thanhcong'>Thêm thương hiệu thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='TT_loi'>Thêm thương hiệu thất bại</span>";
					return $alert;
				}
			}
		}
		public function show_brand()
		{
			$query = "SELECT * FROM tbl_thuonghieu ORDER BY brandId DESC";
			$result = $this->db->select($query);
			return $result;
		}
        public function update_brand($tenthuonghieu,$id){
			$tenthuonghieu = $this->fm->validation($tenthuonghieu); //gọi ham validation từ file Format để ktra
			$tenthuonghieu = mysqli_real_escape_string($this->db->link, $tenthuonghieu);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
             $id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($tenthuonghieu)){
				$alert = "<span class='TT_loi'>Tên không được để trống!!!</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_thuonghieu SET brandName ='$tenthuonghieu' WHERE brandId='$_GET[idthuonghieu]'";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='TB_thanhcong'>Cập nhật thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='TT_loi'>Cập nhật thất bại</span>";
					return $alert;
				}
			}
		}
		public function del_brand($id)
		{
			$query = "DELETE FROM tbl_thuonghieu WHERE 	brandId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Category Deleted Successfully </span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Category Deleted Not Success</span>";
				return $alert;
			}
		}
		public function getbrandbyId($id)
		{
            $query = "SELECT * FROM tbl_thuonghieu where brandId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_thuonghieu_web()
		{
			$query = "SELECT * FROM tbl_thuonghieu order by brandId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		// public function get_product_by_cat($id)
		// {
		// 	$query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
		// 	 ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '$id' order by productId desc LIMIT 8 ";
		// 	$result = $this->db->select($query);
		// 	return $result;	
		// }
		public function get_name_by_brand($id)
		{
			$query = "SELECT tbl_sanpham.*,tbl_thuonghieu.brandName,tbl_thuonghieu.brandId 
					  FROM tbl_sanpham,tbl_thuonghieu 
					  WHERE tbl_sanpham.brandId = tbl_thuonghieu.brandId
					  AND tbl_sanpham.brandId ='$id' LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>










