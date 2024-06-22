<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "Db.php";

class Country extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function getStates($countryId)
    {
        try {
            // SQL query to retrieve states based on the provided country ID
            $sql = "SELECT * FROM state WHERE country = ?";

            // Prepare the query
            $statement = $this->dbconn->prepare($sql);
            $statement->execute([$countryId]);

            // Fetch the result
            $states = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Return the list of states
            return $states;
        } catch (PDOException $e) {
            // Handle PDO exceptions
            $_SESSION['errormsg'] = $e->getMessage();
            return array(); // Return an empty array in case of error
        } catch (Exception $e) {
            // Handle other exceptions
            $_SESSION['errormsg'] = $e->getMessage();
            return array(); // Return an empty array in case of error
        }
    }


    public function getCountries()
    {
        try {
            // SQL query to retrieve all country details
            $sql = "SELECT * FROM country";

            // Prepare and execute the query
            $statement = $this->dbconn->prepare($sql);
            $statement->execute();

            // Fetch all country details
            $countries = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Return the list of country details
            return $countries;
        } catch (PDOException $e) {
            // Handle PDO exceptions
            $_SESSION['errormsg'] = $e->getMessage();
            return array(); // Return an empty array in case of error
        } catch (Exception $e) {
            // Handle other exceptions
            $_SESSION['errormsg'] = $e->getMessage();
            return array(); // Return an empty array in case of error
        }
    }
}
