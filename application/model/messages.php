<?php

class Messages{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    /**
     * Get all songs from database
     */
    public function getAllMessage()
    {
        $sql = "SELECT *  FROM message";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }



    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addMessage($ID, $Sender_id, $Reciever_ID, $message)
    {
        $sql = "INSERT INTO message (ID, Sender_ID, Reciever_ID, message) VALUES (:ID, :Sender_id, :Reciever_ID, :message)";
        $query = $this->db->prepare($sql);
        $parameters = array(':ID' => $ID,':Sender_id' =>  $Sender_id, ':Reciever_ID' =>  $Reciever_ID , ':message' =>  $message );

        // useful for debugging: you can see the SQL behind above construction by using:
    
$query->execute($parameters);

// echo  '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteMessage($Message_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getMessage()
    {
	$song_id = $_COOKIE["name"];
//	$song_id = $_SESSION["name"]; 

  //     $sql = "SELECT *  FROM apartments WHERE Address = :song_id ";
$sql = "SELECT * FROM apartments where City LIKE ? OR Address LIKE ? OR Zip LIKE ? OR Price LIKE ? OR Description LIKE ? OR bedroom_num LIKE ? OR bathroom_num LIKE ? ";       
 $query = $this->db->prepare($sql);
   //     $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:

        $query->execute(array("%$song_id%","%$song_id%","%$song_id%","%$song_id%","%$song_id%","%$song_id%","%$song_id%"));

	//       echo   Helper::texter($value);  exit();
        return $query->fetchAll();

    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateMessage($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfMessage()
    {
        $sql = "SELECT COUNT(ID) AS amount_of_message FROM message";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_message;
    }
}
