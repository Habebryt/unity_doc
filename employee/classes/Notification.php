<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
require_once "Db.php";

class Notification extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function addNotification($user_id_sender, $user_receiver, $message, $document_id_shared)
    {
        try {
            $sql = "INSERT INTO notifications (user_id_sender, receiver_email, message, document_id_shared) VALUES (?, ?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
            $result = $stmt->execute([$user_id_sender, $user_receiver, $message, $document_id_shared]);
            return $result;
        } catch (PDOException $e) {
            // Handle exception
            $_SESSION['errormsg'] = $e->getMessage();
        }
    }

    public function getNotifications($userId)
    {
        try {
            $sql = "SELECT * FROM notifications WHERE user_id_receiver = ? AND is_read = FALSE";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return [];
        }
    }
}

// $notif = new Notification;
// $send = $notif->addNotification('49', '69', "This is a manual checker", '13' );
// print_r($send);
