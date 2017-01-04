<?php
class Profile extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $listings = $this->user->getListings($_SESSION["id"]);
        $listings_count = sizeof($listings);

        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function logout(){
        session_start();
        unset($_SESSION['loggedIn']);

        header('location: ' . URL . 'home');
    }
}