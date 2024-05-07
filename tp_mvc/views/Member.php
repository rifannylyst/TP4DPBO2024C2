<?php

class MemberView
{
    public function render($data)
    {
        $no = 1;
        $dataMembers = null;
        $header = '<tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>JOINING DATE</th>
        <th>ACTIONS</th>
      </tr>';
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date) = $val;
            $dataMembers .= "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $email . "</td>
                        <td>" . $phone . "</td>
                        <td>" . $join_date . "</td>
                        <td>
                            <a href='index.php?edit=" . $id . "' class='btn btn-warning'>Edit</a>
                            <a href='index.php?delete=" . $id . "' class='btn btn-danger'>Delete</a>
                            </td>
                    </tr>";
        }

        // Sesuaikan dengan struktur template yang Anda miliki
        $tpl = new Template("templates/skintabel.html");
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->replace("HEADER_TABEL", $header);
        $tpl->replace("FORM_DATA", "index.php?add=true");
        $tpl->write();
    }

    public function form()
    {
        $dataForm = '<form method="post" action="index.php">
        <br><br><div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Create New Member</h1>
            </div><br>
            <label>NAME:</label>
            <input type="text" name="name" class="form-control"><br>
            <label>EMAIL:</label>
            <input type="text" name="email" class="form-control"><br>
            <label>PHONE:</label>
            <input type="text" name="phone" class="form-control"><br>
            <label>JOINING DATE:</label>
            <input type="date" name="join_date" class="form-control"><br>
            <button class="btn btn-success" type="submit" name="submit" href="index.php">Submit</button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php">Cancel</a><br>
        </div>
    </form>';
        // Sesuaikan dengan struktur template yang Anda miliki
        $tpl = new Template("templates/skinform.html");
        $tpl->replace("FORM_ALL", "index.php?add=true");
        $tpl->replace("ALL_DATA", $dataForm);
        $tpl->write();

    }

    public function formEdit($data)
{
    // Mengambil nilai dari array $data
    $member_id = $data['member_id'];
    $member_name = $data['member_name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $join_date = date('Y-m-d', strtotime($data['join_date'])); // Format tanggal

    // Membuat form dengan nilai awal yang sesuai
    $dataForm = '<form method="post" action="index.php">
        <br><br><div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center">Edit Member</h1>
            </div><br>
            <label>NAME:</label>
            <input type="text" name="name" class="form-control" value="' . $member_name . '"><br>
            <label>EMAIL:</label>
            <input type="text" name="email" class="form-control" value="' . $email . '"><br>
            <label>PHONE:</label>
            <input type="text" name="phone" class="form-control" value="' . $phone . '"><br>
            <label>JOINING DATE:</label>
            <input type="text" name="join_date" class="form-control" value="' . $join_date . '"><br>
            <input type="hidden" name="member_id" value="' . $member_id . '">
            <button class="btn btn-success" type="submit" name="edit">Submit</button><br>
            <a class="btn btn-info" href="index.php">Cancel</a><br>
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
