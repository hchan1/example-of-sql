<?php

class ListingApplication
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }



    public function create($listing_id, $user_id,  $comment) {
        session_start();
        var_dump($_SESSION);
        echo "user_id:  ". $user_id;
        $sql = "INSERT INTO listingApplications (listing_id, user_id, comment) VALUES (:listing_id, :user_id, :comment)";
        $query = $this->db->prepare($sql);
        $parameters = array(':listing_id' => $listing_id, ':user_id' => $_SESSION['id'], ':comment' => $comment);
        // useful for debugging: you can see the SQL behind above construction by using:
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }


    public function getApplicants($listing_id) {
        $sql = "SELECT user_id, comment FROM listingApplications WHERE listing_id = :listing_id";
        $query = $this->db->prepare($sql);
        $params = array(':listing_id' => $listing_id);
        $query->execute($params);
        return $query->fetchAll();

    }


    public function getApplications($user_id) {
        $sql = "SELECT * FROM listingApplications WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $params = array(':user_id' => $user_id);
        $query->execute($params);
        return $query->fetchAll();
    }

    
    // public function delete($application_id)
    // {
    //     $sql = "DELETE FROM song WHERE id = :song_id";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':song_id' => $song_id);

    //     // useful for debugging: you can see the SQL behind above construction by using:
    //     // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    //     $query->execute($parameters);
    // }
}








