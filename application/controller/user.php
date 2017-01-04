<?php
class User extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function register()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_POST['submit_user']))
        {
            $user = array(
            'name' => $_POST["firstName"],
            'lastName'=> $_POST["lastName"],
            'email'=> $_POST["email"],
            'password'=> md5("QxLUF1bgIAdeQX".$_POST['password']),
             'image'=> null);

            $this->user->create($user);
            $this->login();
        }else{

            // Failed to register
            header('location: ' . URL . 'home');
        }
    }

    public function login()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST['submit_user'])
            && $user = $this->user->get($_POST['email'], md5("QxLUF1bgIAdeQX".$_POST['password']))){

            $_SESSION["id"] = $user->id;
            $_SESSION["firstname"] = $user->name;
            $_SESSION["lastname"] = $user->lastName;
            $_SESSION["fullname"] = $user->name." ".$user->lastName;
            $_SESSION["email"] = $user ->email;
            $_SESSION["image"] = $user ->image;
            $_SESSION['loggedIn'] = true;

            header('location: ' . URL . 'profile');
        }else{
            //Display to user: Invalid login
            header('location: ' . URL . 'home');
        }
    }




//     function random_pic($dir = 'uploads')
// {
//     
//     $file = array_rand($files);
//     return $files[$file];
// }
    public function getListingsUserAppliedFor()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $output = array();
        $listings = $this->listingApplication->getApplications($_SESSION["id"]);
        for ($i=0; $i < count($listings) ; $i++) { 
            $id = $listings[$i]->listing_id;
            $listing = $this->listings->get($id);
            $images = glob($listing->image . '/*.*');
            $listing->image = $images[0];
            array_push( $output, $listing);
        }
        echo json_encode($output);
        

    }

    public function update(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = URL . $ds .  "uploads" . $ds . "profilePics";
        if (! file_exists($storeFolder))
        {
            mkdir($storeFolder, 0777, true);
            echo "Created" . $storeFolder;
        } else {
            echo "All good " . $storeFolder . " exists";
            
        }


        if (array_key_exists ( "profile_pic" , $_FILES ) && $_FILES["profile_pic"]["error"] == UPLOAD_ERR_OK) {
                move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $storeFolder.$ds.$_SESSION["id"]);
            }
        
        $user = array(
                'id' => $_SESSION['id'], 'firstname' => $_POST["first_name"], 'lastname' => $_POST["last_name"],
                'email' => $_POST["email"], 'image' =>null
            );
        $this->user->update($user);
    }
}
