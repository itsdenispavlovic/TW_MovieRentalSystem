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

    //Creating account
    public function createAccount($fullname, $username, $email, $password)
    {

        //Verificatm daca Email-ul nu este deja ocupat
        $verifyEmail = $this->db->prepare("SELECT email FROM users WHERE email = :email");
        $verifyEmail->bindParam(':email', $email, PDO::PARAM_STR);
        $verifyEmail->execute();

        //
        if($verifyEmail->rowCount() > 0)
        {
            return false;
        }
        else
        {
            try
            {
                $registerStatement = $this->db->prepare('INSERT INTO users(fullname,username,email,password) VALUES(:fullname, :username, :email, :password)');
                //HASHED PASSWORD
                $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                $registerStatement->execute(array(
                    ':fullname' => $fullname,
                    ':username' => $username,
                    ':email' => $email,
                    ':password' => $hashedPassword
                ));

                if($registerStatement->rowCount() > 0)
                {
                    return true;
                }



            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

    // Login
    public function login($username, $password)
    {
        if(!empty($username) || !empty($password))
        {
            try {
                $statement = $this->db->prepare("SELECT * FROM users WHERE username = :username");
                $statement->bindParam(":username", $username, PDO::PARAM_STR);
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                if($statement->rowCount() > 0)
                {
                    if(password_verify($password, $row['password']))
                    {
                        
                        $_SESSION['user'] = $row['id'];
                        return true;
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    // Get Username 
    public function getUsername($uid)
    {
        
        try {
            $statement = $this->db->prepare("SELECT * FROM users WHERE id = :uid");
            $statement->bindParam(":uid", $uid, PDO::PARAM_INT);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if($statement->rowCount() > 0)
            {
                echo $row['username'];   
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Logout
    public function logout($sess)
    {
        session_destroy();
        unset($sess);
        return true;
    }

}
?>