<?php
    include "./db.php";

?>

<?php
    class inventory{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }

        public function show_inventory(){
            $query = "SELECT 
            tbl_inventory.quatity,
            tbl_inventory.product_id,

            tbl_product.product_name,
            tbl_product.product_id,
            tbl_product.product_code,
            tbl_product.product_quantity,
            tbl_product.product_price,
            tbl_product.product_img,
            tbl_product.cartegory_id

            FROM tbl_inventory
            JOIN tbl_product
            ON tbl_inventory.product_id = tbl_product.product_id
            ORDER BY quatity DESC";
            $result = $this ->db->select($query);
            return $result;
        }
        


        public function update_inventory($product_id,$quatity){
            // $query1= "SELECT * FROM tbl_inventory WHERE product_id = $product_id";

            $query = "UPDATE tbl_inventory SET quatity='$quatity', product_id='$product_id' WHERE product_id='$product_id'";
            $result =$this -> db -> query($query);
            header('location:inventory.php');
            return $result;
        }

        


    }
?>