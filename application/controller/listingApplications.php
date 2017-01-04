<?php

class ListingApplications extends Controller
{
   
    
    public function create()
    {

            $this->listingApplication->create($_POST["listing_id"], $_POST["user_id"],  $_POST["comment"]);
    }


    public function getApplicants()
    {
        $applicants = $this->listingApplication->getApplicants($_GET['listing_id']);

        foreach ($applicants as $a) {
        	$u = $this->user->getUsername($a->user_id);
        	$a->username = $u->name . ' ' . $u->lastName;
        }
        echo json_encode($applicants);
        // echo json_encode($this->listingApplication->getApplicants($_GET['listing_id']));

    }


}







