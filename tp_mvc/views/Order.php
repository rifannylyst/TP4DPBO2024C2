<?php

class OrderView
{
    public function render($data)
    {
        $no = 1;
        $dataOrders = null;
        $header = '<tr>
        <th>ID</th>
        <th>MEMBER</th>
        <th>PRODUCT</th>
        <th>QUANTITY</th>
        <th>ORDER DATE</th>
        <th>ACTIONS</th>
      </tr>';
        foreach ($data as $val) {
            list($id, $member_id, $product_id, $quantity, $order_date) = $val;
            $dataOrders .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $member_id . "</td>
                        <td>" . $product_id . "</td>
                        <td>" . $quantity . "</td>
                        <td>" . $order_date . "</td>
                        <td>
                            <a href='order.php?edit=" . $id . "' class='btn btn-warning'>Edit</a>
                            <a href='order.php?delete=" . $id . "' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
        }

        // Sesuaikan dengan struktur template yang Anda miliki
        $tpl = new Template("templates/skintabel.html");
        $tpl->replace("DATA_TABEL", $dataOrders);
        $tpl->replace("HEADER_TABEL", $header);
        $tpl->replace("FORM_DATA", "order.php?add=true");
        $tpl->replace("Add New", 'Order');
        $tpl->write();
    }

    public function formOrder()
    {
        $dataForm = '<form method="post" action="order.php">
        <br><br><div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create New Member</h1>
            </div><br>
            <label>MEMBER ID:</label>
            <input type="text" name="member_id" class="form-control"><br>
            <label>PRODUCT ID:</label>
            <input type="text" name="product_id" class="form-control"><br>
            <label>QUANTITY:</label>
            <input type="text" name="quantity" class="form-control"><br>
            <label>ORDER DATE:</label>
            <input type="date" name="order_date" class="form-control"><br>
            <button class="btn btn-success" type="submit" name="submit" href="order.php">Submit</button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="order.php">Cancel</a><br>
        </div>
    </form>';
        // Sesuaikan dengan struktur template yang Anda miliki
        $tpl = new Template("templates/skinform.html");
        $tpl->replace("FORM_ALL", "order.php?add=true");
        $tpl->replace("ALL_DATA", $dataForm);
        $tpl->write();
    }

    public function formEdit($data)
{
    // Mengambil nilai dari array $data
    $member_id = $data['member_id'];
    $product_id = $data['product_id'];
    $quantity = $data['quantity'];
    $order_date = date('Y-m-d', strtotime($data['order_date'])); // Format tanggal

    // Membuat form dengan nilai awal yang sesuai
    $dataForm = '<form method="post" action="order.php">
    <br><br><div class="card">
        <div class="card-header bg-primary">
            <h1 class="text-white text-center">Create New Member</h1>
        </div><br>
        <label>MEMBER ID:</label>
        <input type="text" name="member_id" class="form-control"><br>
        <label>PRODUCT ID:</label>
        <input type="text" name="product_id" class="form-control"><br>
        <label>QUANTITY:</label>
        <input type="text" name="quantity" class="form-control"><br>
        <label>ORDER DATE:</label>
        <input type="date" name="order_date" class="form-control"><br>
        <button class="btn btn-success" type="submit" name="submit" href="order.php">Submit</button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="order.php">Cancel</a><br>
    </div>
</form>';

    // Sesuaikan dengan struktur template yang Anda miliki
    $tpl = new Template("templates/skinform.html");
    $tpl->replace("FORM_ALL", "index.php?add=true");
    $tpl->replace("ALL_DATA", $dataForm);
    $tpl->write();
}
}

?>
