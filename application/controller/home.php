<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {

        $listings = $this->listings->getAll();
        $listings_count = $this->listings->getCount();
        $result_title = "Recent Listings";
        $searchBy = "All";

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function search()
    {
        if (isset($_GET["submit_search"]) && !empty($_GET['search']))
        {
            $listings = $this->listings->search($_GET['type'], $_GET['search']);
            $listings_count = count ($listings);
            $result_title = "Search Results";
            $searchBy = $_GET['type'];

        }else if (isset($_GET["type"]) && isset($_GET["submit_filter"])){
            if (!isset($_GET["search"])){
                $_GET["search"] = null;
            }
            $listings = $this->listings->search($_GET['type'], $_GET['search']);
            $listings_count = count ($listings);
            $result_title = "Search Results";
            $searchBy = $_GET['type'];
        }else{
            header('location: ' . URL . 'listing');
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/listing/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function upload_image()
    {
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = ".." . $ds .  ".." .$ds ."uploads";
        if (! file_exists($storeFolder))
        {
            mkdir($storeFolder);
            echo "Created" . $storeFolder;
        } else {
            echo "All good " . $storeFolder . " exists";
        }
       
        if (!empty($_FILES)) {

            $tempFile = $_FILES['file']['tmp_name'];
            echo($tempFile);

            $cookieId = 1 + $this->listings->getCount();

            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds . $cookieId . $ds;
            echo $targetPath;

            if (!file_exists($targetPath) )
            {
                mkdir($targetPath, 0777, true);
            }

            $targetFile =  $targetPath. $_FILES['file']['name'];
            
            if (is_writable($targetPath)) {
                echo("file Writeable");
            } else {
                echo($targetPath. "is not Writeable");
            }
            
            if (move_uploaded_file($tempFile,$targetFile)) {
                echo "file uploaded sucessfully";
             } else {
                echo "\nno success";
             }

             print_r($_FILES);

        }
    }
}
