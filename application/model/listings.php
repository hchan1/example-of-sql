<?php

class Listings
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
     * Get all listings from database
     */
    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM listings");
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get a single listing from database
     * @param int $id
     */
    public function get($listing_id)
    {
        $sql = "SELECT * FROM listings WHERE id = :listing_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':listing_id' => $listing_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * Delete a listing in the database
     * @param int $listing_id Id of listing
     */
    public function delete($listing_id)
    {
        $sql = "DELETE FROM listings WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $listing_id);

        $query->execute($parameters);
    }


    /**
     * Get the number of listings in DB
     * @return int listings_count
     */
    public function getCount()
    {
        $sql = "SELECT COUNT(id) AS listings_count FROM listings";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->listings_count;
    }

    /**
     * Add a listing to database
     * @param $listingDict as a dictionary
     * @keys: address, city, zip, description, image (BLOB), bathroom, bedroom, price
     * Example: $listingDict = $array(
     *                  "address"=>"Some address",
     *                  "city"=>"Some city",
     *                  "zip"=>94353,
     *                  ...);
     */
    public function add($listingDict)
    {
        $user_id = $listingDict['user_id'];
        $address = $listingDict['address'];
        $city = $listingDict['city'];
        $zip = $listingDict['zip'];
        $description = $listingDict['description'];
        $image = $listingDict['image'];
        $bathroom = $listingDict['bathroom'];
        $bedroom = $listingDict['bedroom'];
        $price = $listingDict['price'];
        $listingType = $listingDict['type'];
        $area = $listingDict['area'];
        $deposit = $listingDict['deposit'];
        $bus = $listingDict["bus"];
        $bike = intval(intval($listingDict["bike"])/60);
        $car = intval(intval($listingDict["car"])/60);
        $walk = intval(intval($listingDict["walk"])/60);

        $sql = "INSERT INTO listings (user_id, address, city, zip, description, image, bathroom, bedroom, price, type, area, deposit, bus, bike, car, walk)
                VALUES (:user_id, :address, :city, :zip, :description, :image, :bathroom, :bedroom, :price, :listingType, :area, :deposit, :bus, :bike, :car, :walk)";

        $query = $this->db->prepare($sql);

        $parameters = array('user_id' => $user_id, 'address' => $address,
                            'city' => $city, 'zip' => $zip,
                            'description' => $description, 'image' => $image,
                            'bathroom' => $bathroom, 'bedroom' => $bedroom,
                            'price' => $price, 'listingType' => $listingType,
                            'area' => $area, 'deposit' => $deposit,
                            'bus' => $bus, 'bike' => $bike,
                            'car' => $car, 'walk' => $walk
                            );

        $query->execute($parameters);
    }

    /**
     * Search for entries by keyword
     * @param String $filterType, String $keyword
     * @return $listings
     */
    public function search($filterType, $keyword)
    {

        if ($filterType != "All" && empty($keyword)){
            $sql = "SELECT * FROM listings WHERE type LIKE '%" . $filterType ."%'";
        }else if ($filterType == "All"){
            $sql = "SELECT * FROM listings WHERE city LIKE '%" . $keyword . "%'
                                            OR address LIKE '%" . $keyword . "%'
                                            OR description LIKE '%" . $keyword . "%'
                                            OR zip LIKE '" . $keyword . "%'";
	    }else{
            $sql = "SELECT * FROM listings WHERE city LIKE '%" . $keyword . "%'
                                            OR address LIKE '%" . $keyword . "%'
                                            OR description LIKE '%" . $keyword . "%'
                                            OR zip LIKE '" . $keyword . "%'
                                            AND type LIKE '%" . $filterType ."%'";
        }

        $query = $this->db->prepare($sql);
        $query->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll();
    }
}
