<?php

class Listing extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $listings = $this->listings->getAll();
        $listings_count = $this->listings->getCount();

        require APP . 'view/_templates/header.php';
        require APP . 'view/listing/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function create()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/listing/create.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function detail()
    {
        if (isset($_GET["entry"]))
        {
            $detail = $this->listings->get($_GET["entry"]);
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/listing/detail.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete() 
    {
        if (isset($_POST["listingID"])) {
            $listing = $this->listings->delete($_POST["listingID"]);
            echo $_POST["listingID"];
        }

    }
    

    public function upload()
    {
        if (isset($_POST["upload"])) {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $listingType[0] = "Apartment";
            $listingType[1] = "Condo";
            $listingType[2] = "Townhouse";
            $listingType[3] = "House";
            $type = $listingType[rand(0, 3)];

            $ds = DIRECTORY_SEPARATOR;
            $storeFolder = ".." . $ds .  ".." .$ds ."uploads";
            $cookieId = 1 + $this->listings->getCount();
            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds . $cookieId . $ds;

            $listingObject = array(
                'user_id' => $_SESSION['id'],
                'address' => $_POST["address"],
                'city' => $_POST["city"],
                'zip' => $_POST["zip"],
                'type' => $type,
                'description' => $_POST["description"],
                'image' => $targetPath,
                'area' => $_POST["area"],
                'bathroom' => $_POST["bathrooms"],
                'bedroom' => $_POST["bedrooms"],
                'deposit' => $_POST["deposit"],
                'price' => $_POST["price"],
                'bus' => $_POST['transit'],
                'bike' => $_POST['bicycling'],
                'car' => $_POST['driving'],
                'walk' => $_POST['walking']
            );

            $this->listings->add($listingObject);
            header('location: ' . URL . 'home');
        }
    }

}
