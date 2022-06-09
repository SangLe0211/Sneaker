<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	* 
	*/
	class xuly
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_category($tendanhmuc){
			$tendanhmuc = $this->fm->validation($tendanhmuc);
            //gọi ham validation từ file Format để ktra
			$tendanhmuc = mysqli_real_escape_string($this->db->link, $tendanhmuc);
          
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($tendanhmuc)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_danhmucsp(tendanhmuc) VALUE('".$tendanhmuc."')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='TB_thanhcong'>Thêm danh mục thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='TT_loi'>Thêm danh mục thất bại</span>";
					return $alert;
				}
			}
		}
		public function show_category()
		{
			$query = "SELECT * FROM tbl_danhmucsp ORDER BY id_danhmuc DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
        public function update_category($tendanhmuc,$id){
			$tendanhmuc = $this->fm->validation($tendanhmuc);//gọi ham validation từ file Format để ktra
			$tendanhmuc = mysqli_real_escape_string($this->db->link, $tendanhmuc);
			$id = mysqli_real_escape_string($this->db->link, $id);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($tendanhmuc)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_danhmucsp SET tendanhmuc='$tendanhmuc' WHERE id_danhmuc='$_GET[iddanhmuc]'";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='TB_thanhcong'>Update danh mục thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='TT_loi'>Update danh mục thất bại</span>";
					return $alert;
				}
			}
		}
		public function del_category($id)
		{
			$query = "DELETE FROM tbl_danhmucsp WHERE id_danhmuc = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Category Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Category Deleted Not Success</span>";
				return $alert;
			}
		}
		public function getcatbyId($id)
		{
            $query = "SELECT * FROM tbl_danhmucsp where id_danhmuc = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_category_fontend()
		{
			$query = "SELECT * FROM tbl_danhmucsp order by id_danhmuc desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id)
		{
			$query = "SELECT * FROM tbl_product where id_danhmuc = '$id' order by id_danhmuc desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id)
		{
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId 
					  FROM tbl_product,tbl_category 
					  WHERE tbl_product.catId = tbl_category.catId
					  AND tbl_product.catId ='$id' LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>










