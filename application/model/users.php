<?php

class Users
{
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
     * Create new user
     * @key name, lastName, email, password, image
     * @param user Object
     */
    function create($user)
    {
        $firstName = $user['name'];
        $lastName = $user['lastName'];
        $email = $user['email'];
        $password = $user['password'];
        $image = $user['image'];

        $sql = "INSERT INTO users(name, lastName, email, password, image)
                VALUES (:firstName, :lastName, :email, :password, :image)";

        $query = $this->db->prepare($sql);
        $parameters = array('firstName' => $firstName, 'lastName' => $lastName,
            'email' => $email, 'password' => $password, 'image' => $image);

        $query->execute($parameters);
    }

    /**
     * Returns user object
     * @param $email String, $password String
     */

    function getUsername($id) {
         $sql = "SELECT * FROM users WHERE id = :id";

        $query = $this->db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    function get($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

        $query = $this->db->prepare($sql);

        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);

        $query->execute();
        return $query->fetch();
    }

    /**
     * Get the number of users in DB
     * @return int users_count
     */
    public function getCount()
    {
        $sql = "SELECT COUNT(id) AS users_count FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->users_count;
    }

    /**
     * Get user listings from DB
     * @param int user_id
     */
    public function getListings($userId)
    {
        $sql = "SELECT * FROM listings WHERE user_id LIKE :userId";

        $query = $this->db->prepare($sql);
        $query->bindValue(':userId', $userId, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Delete a user in the database
     * @param int $user_id
     */
    public function delete($user_id)
    {
        $sql = "DELETE FROM user WHERE id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $user_id);

        $query->execute($parameters);
    }

    /**
     * Update user info
     * @param $user object
     */
    public function update($user){
        $id = $user["id"];
        $name = $user["firstname"];
        $lastName = $user["lastname"];
        $email = $user["email"];
        $image = $user["image"];

        $sql = "UPDATE users SET name = :name, lastName = :lastName, email = :email, image = :image WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':lastName' => $lastName, ':email' => $email, ':image' => $image, ':id' => $id);

        $query->execute($parameters);
    }
}