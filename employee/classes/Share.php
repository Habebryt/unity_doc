<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
require_once "Db.php";

class Share extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function sharedBy($userId)
    {
        $sql = "SELECT * FROM shared_doc 
        JOIN users ON shared_doc.shared_by =users.idusers 
        JOIN document ON shared_doc.shared_do_id=document.iddocument  
        WHERE shared_with =? ";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$userId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (is_array($result)) {
            return $result;
        } else {
            return false;
        }
    }

    public function sharedWith($userId)
    {
        $sql = "SELECT * FROM shared_doc 
        JOIN users ON shared_doc.shared_with =users.idusers
        JOIN document ON shared_doc.shared_do_id=document.iddocument   
        WHERE shared_by =? ORDER BY shared_date DESC LIMIT 5";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$userId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (is_array($result)) {
            return $result;
        } else {
            return false;
        }
    }

    public function sharedDocs($userId)
    {
        $sql = "SELECT 
                shared_doc.idshared_doc,
                shared_doc.shared_do_id,
                shared_doc.shared_by,
                shared_doc.shared_with,
                shared_doc.shared_date,
                shared_doc.collaboration_desc,
                user_shared_by.idusers AS shared_by_id,
                user_shared_by.username AS shared_by_username,
                user_shared_by.firstname AS shared_by_firstname,
                user_shared_by.lastname AS shared_by_lastname,
                user_shared_by.user_email AS shared_by_email,
                user_shared_by.user_role AS shared_by_role,
                user_shared_by.profile_image AS shared_by_profile_image,
                user_shared_by.default_image AS shared_by_default_image,
                user_shared_by.user_org AS shared_by_org,
                user_shared_by.user_team_id AS shared_by_team_id,
                user_shared_by.user_phone AS shared_by_phone,
                user_shared_with.idusers AS shared_with_id,
                user_shared_with.username AS shared_with_username,
                user_shared_with.firstname AS shared_with_firstname,
                user_shared_with.lastname AS shared_with_lastname,
                user_shared_with.user_email AS shared_with_email,
                user_shared_with.user_role AS shared_with_role,
                user_shared_with.profile_image AS shared_with_profile_image,
                user_shared_with.default_image AS shared_with_default_image,
                user_shared_with.user_org AS shared_with_org,
                user_shared_with.user_team_id AS shared_with_team_id,
                user_shared_with.user_phone AS shared_with_phone,
                document.iddocument,
                document.doc_title,
                document.doc_desc,
                document.document_file,
                document.upload_date,
                document.modified_date,
                document.doc_creator,
                document.creator_team,
                collaboration.idcollaboration
            FROM shared_doc 
            JOIN users AS user_shared_by ON shared_doc.shared_by = user_shared_by.idusers
            JOIN users AS user_shared_with ON shared_doc.shared_with = user_shared_with.idusers
            JOIN document ON shared_doc.shared_do_id = document.iddocument 
            JOIN collaboration ON shared_doc.idshared_doc = collaboration.shared_doc_id 
            WHERE shared_doc.shared_by = ? OR shared_doc.shared_with = ?";

        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$userId, $userId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (is_array($result)) {
            return $result;
        } else {
            return false;
        }
    }

    public function getSharedDoc($docId)
    {
        $sql = "SELECT 
                shared_doc.idshared_doc,
                shared_doc.shared_do_id,
                shared_doc.shared_by,
                shared_doc.shared_with,
                shared_doc.shared_date,
                shared_doc.collaboration_desc,
                user_shared_by.idusers AS shared_by_id,
                user_shared_by.username AS shared_by_username,
                user_shared_by.firstname AS shared_by_firstname,
                user_shared_by.lastname AS shared_by_lastname,
                user_shared_by.user_email AS shared_by_email,
                user_shared_by.user_role AS shared_by_role,
                user_shared_by.profile_image AS shared_by_profile_image,
                user_shared_by.user_org AS shared_by_org,
                user_shared_by.user_team_id AS shared_by_team_id,
                user_shared_by.user_phone AS shared_by_phone,
                user_shared_with.idusers AS shared_with_id,
                user_shared_with.username AS shared_with_username,
                user_shared_with.firstname AS shared_with_firstname,
                user_shared_with.lastname AS shared_with_lastname,
                user_shared_with.user_email AS shared_with_email,
                user_shared_with.user_role AS shared_with_role,
                user_shared_with.profile_image AS shared_with_profile_image,
                user_shared_with.user_org AS shared_with_org,
                user_shared_with.user_team_id AS shared_with_team_id,
                user_shared_with.user_phone AS shared_with_phone,
                document.iddocument,
                document.doc_title,
                document.doc_desc,
                document.document_file,
                document.upload_date,
                document.modified_date,
                document.doc_creator,
                document.creator_team,
                collaboration.idcollaboration
            FROM shared_doc 
            JOIN users AS user_shared_by ON shared_doc.shared_by = user_shared_by.idusers
            JOIN users AS user_shared_with ON shared_doc.shared_with = user_shared_with.idusers
            JOIN document ON shared_doc.shared_do_id = document.iddocument 
            JOIN collaboration ON shared_doc.idshared_doc = collaboration.shared_doc_id 
            WHERE idshared_doc = ?";

        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$docId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (is_array($result)) {
            return $result;
        } else {
            return false;
        }
    }

    // public function getSharedDoc($userId)
    // {
    //     $sql = "SELECT 
    //             shared_doc.idshared_doc,
    //             shared_doc.shared_do_id,
    //             shared_doc.shared_by,
    //             shared_doc.shared_with,
    //             shared_doc.shared_date,
    //             shared_doc.collaboration_desc,
    //             user_shared_by.idusers AS shared_by_id,
    //             user_shared_by.username AS shared_by_username,
    //             user_shared_by.firstname AS shared_by_firstname,
    //             user_shared_by.lastname AS shared_by_lastname,
    //             user_shared_by.user_email AS shared_by_email,
    //             user_shared_by.user_role AS shared_by_role,
    //             user_shared_by.profile_image AS shared_by_profile_image,
    //             user_shared_by.user_org AS shared_by_org,
    //             user_shared_by.user_team_id AS shared_by_team_id,
    //             user_shared_by.user_phone AS shared_by_phone,
    //             user_shared_with.idusers AS shared_with_id,
    //             user_shared_with.username AS shared_with_username,
    //             user_shared_with.firstname AS shared_with_firstname,
    //             user_shared_with.lastname AS shared_with_lastname,
    //             user_shared_with.user_email AS shared_with_email,
    //             user_shared_with.user_role AS shared_with_role,
    //             user_shared_with.profile_image AS shared_with_profile_image,
    //             user_shared_with.user_org AS shared_with_org,
    //             user_shared_with.user_team_id AS shared_with_team_id,
    //             user_shared_with.user_phone AS shared_with_phone,
    //             document.iddocument,
    //             document.doc_title,
    //             document.doc_desc,
    //             document.document_file,
    //             document.upload_date,
    //             document.modified_date,
    //             document.doc_creator,
    //             document.creator_team,
    //             collaboration.idcollaboration,
    //             comments.idcomments,	
    //             comments.assignor_comment,	
    //             comments.assignee_comment	
    //         FROM shared_doc 
    //         JOIN users AS user_shared_by ON shared_doc.shared_by = user_shared_by.idusers
    //         JOIN users AS user_shared_with ON shared_doc.shared_with = user_shared_with.idusers
    //         JOIN document ON shared_doc.shared_do_id = document.iddocument 
    //         JOIN collaboration ON shared_doc.idshared_doc = collaboration.shared_doc_id
    //         JOIN comments ON comments.collab_id = collaboration.idcollaboration
    //         WHERE shared_doc.shared_by = ? OR shared_doc.shared_with = ?";

    //     $stmt = $this->dbconn->prepare($sql);
    //     $stmt->execute([$userId, $userId]);
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     if (is_array($result)) {
    //         return $result;
    //     } else {
    //         return false;
    //     }
    // }




    public function shareDoc($doc_title, $doc_desc, $doc_file, $doc_creator, $email, $username, $coll_desc)
    {


        $this->dbconn->beginTransaction();
        try {

            $sql1 = "SELECT idusers FROM users WHERE user_email = ? || username = ?";
            $stmt1 = $this->dbconn->prepare($sql1);
            $stmt1->execute([$email, $username]);
            $user = $stmt1->fetch(PDO::FETCH_ASSOC);


            if (is_array($user)) {
                $shareTo = $user['idusers']; // Assuming 'idusers' is the key for user ID
            } else {
                return false;
            }
            //working

            $sql2 = "INSERT INTO document (doc_title, doc_desc, document_file, doc_creator) VALUES (?, ?, ?, ?)";
            $stmt2 = $this->dbconn->prepare($sql2);
            $result2 = $stmt2->execute([$doc_title, $doc_desc, $doc_file, $doc_creator]);

            //working

            if ($result2) {
                $doc_id = $this->dbconn->lastInsertId();

                //sharing sql
                $sql3 = "INSERT INTO shared_doc (shared_do_id, shared_by, shared_with, collaboration_desc) VALUES (?,?,?,?)";

                $stmt3 = $this->dbconn->prepare($sql3);
                $result3 = $stmt3->execute([$doc_id, $doc_creator, $shareTo, $coll_desc]);

                //working
            }
            if ($result3) {
                $sharedDoc = $this->dbconn->lastInsertId();

                $sql4 = "INSERT INTO collaboration (document_id_idx, shared_doc_id, user_id_idx) VALUES (?,?, ?)";
                $stmt4 = $this->dbconn->prepare($sql4);
                $result4 = $stmt4->execute([$doc_id, $sharedDoc, $doc_creator]);

                //working

                if ($result4 == true) {
                    $this->dbconn->commit(); // Commit the transaction
                } else {
                    $_SESSION['user_errormsg'] = "Error adding Sharing document with $user";
                    $this->dbconn->rollBack(); // Rollback the transaction
                }
            }
            return $shareTo;
        } catch (PDOException $e) {
            $_SESSION['user_errormsg'] = $e->getMessage();
            $this->dbconn->rollBack(); // Rollback the transaction
            return false;
        } catch (Exception $e) {
            $_SESSION['user_errormsg'] = $e->getMessage();
            $this->dbconn->rollBack(); // Rollback the transaction
            return false;
        }
    }
//     public function shareDoc($doc_title, $doc_desc, $doc_file, $doc_creator, $email, $username, $coll_desc)
// {
//     $this->dbconn->beginTransaction();
//     try {
//         // Select user id
//         $sql1 = "SELECT idusers FROM users WHERE user_email = ? OR username = ?";
//         $stmt1 = $this->dbconn->prepare($sql1);
//         $stmt1->execute([$email, $username]);
//         $user = $stmt1->fetch(PDO::FETCH_ASSOC);
//         if (!$user) {
//             return false;
//         }

//         $shareTo = $user['idusers'];
        

//         // Insert document
//         $sql2 = "INSERT INTO document (doc_title, doc_desc, document_file, doc_creator) VALUES (?, ?, ?, ?)";
//         $stmt2 = $this->dbconn->prepare($sql2);
//         $stmt2->execute([$doc_title, $doc_desc, $doc_file, $doc_creator]);

//         $doc_id = $this->dbconn->lastInsertId();

       
//         // Insert shared document
//         $sql3 = "INSERT INTO shared_doc (shared_do_id, shared_by, shared_with, collaboration_desc) VALUES (?, ?, ?, ?)";
//         $stmt3 = $this->dbconn->prepare($sql3);
//         $stmt3->execute([$doc_id, $doc_creator, $shareTo, $coll_desc]);

//         $sharedDoc = $this->dbconn->lastInsertId();

        
//         // Insert collaboration
//         $sql4 = "INSERT INTO collaboration (document_id_idx, shared_doc_id, user_id_idx) VALUES (?, ?, ?)";
//         $stmt4 = $this->dbconn->prepare($sql4);
//         $stmt4->execute([$doc_id, $sharedDoc, $doc_creator]);

//         // Add notification
//         $notification = new Notification();
//         $message = "A document titled '$doc_title' has been shared with you.";
//         $notification->addNotification($doc_creator, $shareTo, $message, $sharedDoc);
        
//         $this->dbconn->commit(); // Commit the transaction
//         return $sharedDoc;
//     } catch (PDOException $e) {
//         $_SESSION['user_errormsg'] = $e->getMessage();
//         $this->dbconn->rollBack(); // Rollback the transaction
//         return false;
//     } catch (Exception $e) {
//         $_SESSION['user_errormsg'] = $e->getMessage();
//         $this->dbconn->rollBack(); // Rollback the transaction
//         return false;
//     }
// }


}
