<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
require_once "Db.php";

class Document extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function getRecentDocuments($userId)
    {
        try {
            $sql = "SELECT *
                    FROM document
                    JOIN users ON document.doc_creator = users.idusers
                    LEFT JOIN tagmapping ON tagmapping.doc_id = document.iddocument
                    JOIN doctag ON tagmapping.doc_id = doctag.iddoctag
                    WHERE doc_creator = ?
                    ORDER BY upload_date DESC
                    LIMIT 5";

            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$userId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return []; // Return an empty array in case of error
        } catch (Exception $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return []; // Return an empty array in case of error
        }
    }

    public function getDocuments($userId)
    {
        try {
            $sql = "SELECT * FROM document 
            JOIN users ON document.doc_creator=users.idusers 
            JOIN tagmapping ON document.iddocument = tagmapping.doc_id
            JOIN doctag ON tagmapping.tag_id = doctag.iddoctag
            WHERE doc_creator = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$userId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        }
    }

    public function getDocByTagMap($doc_id)
    {
        try {
            $sql = "SELECT * 
            FROM tagmapping 
            JOIN document ON document.iddocument = tagmapping.doc_id 
            JOIN users ON document.doc_creator = users.idusers 
            JOIN doctag ON tagmapping.tag_id = doctag.iddoctag
            WHERE doc_id = ?;
            ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$doc_id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        }
    }

    public function getDocument($doc_id)
    {
        try {
            $sql = "SELECT * FROM document WHERE iddocument = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$doc_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['errormsg'] = $e->getMessage();
            return 0;
        }
    }

    public function addDocument($doc_title, $doc_desc, $doc_file, $doc_creator, $creator_team, $tag)
    {
        try {
            // Start transaction
            $this->dbconn->beginTransaction();

            // Insert document
            $sql = "INSERT INTO document (doc_title, doc_desc, document_file, doc_creator, creator_team) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
            $result = $stmt->execute([$doc_title, $doc_desc, $doc_file, $doc_creator, $creator_team]);

            // echo  "<pre>";
            // var_dump($result);
            // echo "</pre>";
            // echo "This is a checker";
            // die;
            if ($result) {
                $doc_id = $this->dbconn->lastInsertId();
                //Insert tag
                $sql2 = "INSERT INTO doctag (tag_name) VALUES (?)";
                $stmt2 = $this->dbconn->prepare($sql2);
                $tagResult = $stmt2->execute([$tag]);

                if ($tagResult) {
                    $tag_id = $this->dbconn->lastInsertId();
                    // Insert tagmapping
                    $tagSql = "INSERT INTO tagmapping (doc_id, tag_id) VALUES (?, ?)";
                    $tagStmt = $this->dbconn->prepare($tagSql);
                    $mapResult = $tagStmt->execute([$doc_id, $tag_id]);

                    // echo  "<pre>";
                    // var_dump($mapResult);
                    // echo "</pre>";
                    // echo "This is a checker";
                    // die;

                    if ($mapResult) {
                        $_SESSION['user_feedback'] = "Document uploaded successfully";
                        $this->dbconn->commit(); // Commit the transaction
                    } else {
                        $_SESSION['user_errormsg'] = "Error adding tag mapping to the database";
                        $this->dbconn->rollBack(); // Rollback the transaction
                    }
                } else {
                    $_SESSION['user_errormsg'] = "Error adding tag to the database";
                    $this->dbconn->rollBack(); // Rollback the transaction
                }
            } else {
                $_SESSION['user_errormsg'] = "Error adding document to the database";
                $this->dbconn->rollBack(); // Rollback the transaction
            }

            return $result;
        } catch (PDOException $p) {
            $_SESSION['user_errormsg'] = $p->getMessage();
            $this->dbconn->rollBack(); // Rollback the transaction
            return false;
        }
    }
}

// $new = new Document;
// $add = $new->addDocument("Habeeb", "This is a direct check", "Habeebmain.pdf", 49, 1, "Partnership");
