<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM products";
      $result = mysqli_query($conn, $sql);
      $num1=1;
      while ($row = mysqli_fetch_assoc($result)) {
        $num1++;
        $product_id=$row['product_id'];
        $dealer_id=$row['dealer_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keyword=$row['product_keyword'];
        $catagory_id=$row['catagory_id'];
        $brand_id=$row['brand_id'];
        $product_price=$row['product_price'];
        $date=$row['date'];
        
        echo "
        <tr>
                    <th scope='row'>$num1</th>
                    <td>$product_id</td>
                    <td>$dealer_id</td>
                    <td>$product_title</td>
                    <td>$product_description</td>
                    <td>$product_keyword</td>
                    <td>$catagory_id</td>
                    <td>$brand_id</td>
                    <td>$product_price</td>
                    <td>$date</td>
                    
                </tr>

        ";
        
        
        
        
        //echo "<tr>";
        
        //echo "<td>" . $row["product_name"] . "</td>";
        //echo "<td>" . $row["product_description"] . "</td>";
        //echo "<td>" . $row["price"] . "</td>";
        //echo "<td>";
        //echo "<a href='edit_product.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a> ";
        //echo "<a href='delete_product.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>";
        //echo "</td>";
        //echo "</tr>";
      }
    ?>
    
  </tbody>
</table>

