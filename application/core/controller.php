<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var $listings Model
     */
    public $listings = null;

    /**
     * @var $messages Model
     */
    public $messages = null;

    /**
     * $var $user Model
     */
    public $user = null;

    public $listingApplication = null;

    /**
     * Whenever controller is created, open a database connection too and load "the models".
     */
    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';   port = 8889 ;dbname='    . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the models: "Listings", "Messages", "Users.
     * @return object models
     */
    public function loadModel()
    {
        require APP . 'model/listings.php';
        require APP . 'model/messages.php';
        require APP . 'model/users.php';
        require APP . 'model/listingApplication.php';

        $this->messages = new Messages($this->db);
        $this->listings = new Listings($this->db);
        $this->user = new Users($this->db);
        $this->listingApplication = new ListingApplication($this->db);
    }
}
