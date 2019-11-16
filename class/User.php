<?php
class User
{
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // Is logged in or not
    public function isLoggedin()
    {
        if(isset($_SESSION['admin']))
        {
            return true;
        }
        else if(isset($_SESSION['user']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>