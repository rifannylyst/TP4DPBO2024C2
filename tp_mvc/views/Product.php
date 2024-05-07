<?php

class ProductView
{
    public function render($data)
    {
        $no = 1;
        $dataProducts = null;
        $header = '<tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>ACTIONS</th>
      </tr>';
        foreach ($data as $product) {
            $dataProducts .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $product['name'] . "</td>
                        <td>" . number_format($product['price'], 2) . "</td>
                        <td>
                            <a href='product.php?edit=" . $product['product_id'] . "' class='btn btn-warning'>Edit</a>
                            <a href='product.php?delete=" . $product['product_id'] . "' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
        }

        $tpl = new Template("templates/skintabel.html"); // Sesuaikan dengan struktur template yang Anda miliki
        $tpl->replace("DATA_TABEL", $dataProducts);
        $tpl->replace("HEADER_TABEL", $header);
        $tpl->replace("FORM_DATA", "product.php?add=true");
        $tpl->replace("Add New", 'Add');
        $tpl->write();
    }

    public function formProduct()
    {
        $dataForm = '<form method="post" action="product.php">
        <br><br><div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create New Product</h1>
            </div><br>
            <label>MEMBER ID:</label>
            <input type="text" name="member_id" class="form-control"><br>
            <label>NAME:</label>
            <input type="text" name="name" class="form-control"><br>
            <label>PRICE:</label>
            <input type="text" name="price" class="form-control"><br>
            <button class="btn btn-success" type="submit" name="submit" href="product.php">Submit</button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="product.php">Cancel</a><br>
        </div>
    </form>';
        // Sesuaikan dengan struktur template yang Anda miliki
        $tpl = new Template("templates/skinform.html");
        $tpl->replace("FORM_ALL", "product.php?add=true");
        $tpl->replace("ALL_DATA", $dataForm);
        $tpl->write();

    }

    public function formEdit($data)
{
    $name = $data['name'];
    $price = $data['price'];

    // Membuat form dengan nilai awal yang sesuai
    $dataForm = '<form method="post" action="product.php">
    <br><br><div class="card">
        <div class="card-header bg-primary">
            <h1 class="text-white text-center">Create New Product</h1>
        </div><br>
        <label>MEMBER ID:</label>
        <input type="text" name="member_id" class="form-control"><br>
        <label>NAME:</label>
        <input type="text" name="name" class="form-control"><br>
        <label>PRICE:</label>
        <input type="text" name="price" class="form-control"><br>
        <button class="btn btn-success" type="submit" name="submit" href="product.php">Submit</button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="product.php">Cancel</a><br>
    </div>
</form>';

    // Sesuaikan dengan struktur template yang Anda miliki
    $tpl = new Template("templates/skinform.html");
    $tpl->replace("FORM_ALL", "product.php?add=true");
    $tpl->replace("ALL_DATA", $dataForm);
    $tpl->write();
}
}

?>
