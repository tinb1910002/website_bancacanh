<?php
    include "header.php";

    include "class/inventory_class.php";
    

?>

<?php         
            $product = new inventory;
            $show_inventory = $product ->show_inventory();       
?>


            <div class="admin-content-right text-center" style="width: 100%;   padding: 1rem 9%;">
                <div class="admin-content-right-cartegory-list">
                    <h1 class="text-danger">DANH SÁCH SẢN PHẨM ĐÃ BÁN</h1>
                    <form action="" class="search-form" method="POST"
                        style="float: right; border: 1px solid rgb(13,110,253); padding: 0px; border-radius: 5px">
                        
                        <button class="btn btn-primary" type="submit">Cập Nhập</button>
                    </form>
                    <table class="table table-secondary" style="    margin-top: 70px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng cung cấp</th>
                                <th>Sản phẩm đã bán</th>
                                <th>Ảnh sản phẩm</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                            <?php
                                if($show_inventory){$i=0;
                                    while($result = $show_inventory->fetch_assoc()){$i++;

                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $result['product_id'] ?></td>
                                            <td><?php echo $result['product_code'] ?></td>
                                            <td><?php echo $result['product_name'] ?></td>
                                            <td><?php echo $result['cartegory_id'] ?></td>
                                            <td><?php echo number_format($result['product_price']) ?></td>
                                            <td><?php echo $result['product_quantity'] ?></td>
                                            <td><?php echo $result['quatity'] ?></td>   
                                            <td><img src="uploads/<?php echo $result['product_img'] ?>" width="100"></td>
                                        </tr>
                                        <?php
                                                }
                                            }   
                                        ?>

                        </tbody>
                        
                    </table>
                </div>
            </div>
    
            </section>
    </body>
</html>
    