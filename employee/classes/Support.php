<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
require_once "Db.php";

class Support extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function sendSupport($firstname, $lastname, $email, $subject, $message, $status)
    {

        $this->dbconn->beginTransaction();
        try {
            $sql = "INSERT INTO support (firstname, lastname, email, subject, message, reg_user_id) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
            $result = $stmt->execute([$firstname, $lastname, $email, $subject, $message, $status]);

            if ($result) {
                $this->dbconn->commit();
                return true;
            } else {
                $this->dbconn->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            $_SESSION['user_errormsg'] = $e->getMessage();
            $this->dbconn->rollBack();
            return false;
        } catch (Exception $e) {
            $_SESSION['user_errormsg'] = $e->getMessage();
            $this->dbconn->rollBack();
            return false;
        }
    }
}


// $support = new Support;
// $spt = $support->sendSupport('Habeeb', 'Bright', 'hb@gmail.com', 'check manual', 'This si a manual checker', '1');
