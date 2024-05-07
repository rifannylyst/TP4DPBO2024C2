<?php

class Member extends DB
{
    function getAllMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE member_id = $id";
        return $this->execute($query);
    }

    function addMember($data)
    {
        $member_name = $data['member_name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        
        $query = "INSERT INTO members (member_name, email, phone, join_date) VALUES ('$member_name', '$email', '$phone', '$join_date')";
        return $this->execute($query);
    }

    function editMember($data)
    {
        $id = $data['member_id'];
        $member_name = $data['member_name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
    
        $query = "UPDATE members SET member_name = '$member_name', email = '$email', phone = '$phone', join_date = '$join_date' WHERE member_id = $id";
    
        return $this->execute($query);
    }
    
    function deleteMember($id)
    {
        $query = "DELETE FROM members WHERE member_id = $id";
        return $this->execute($query);
    }
}

?>
