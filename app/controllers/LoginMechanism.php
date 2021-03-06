<?php


namespace App\controllers;


class LoginMechanism
{
    public function signup($data){
        if(!$this->saveDetails($data)){
            return(["error" => "User already Exist with the same Mobile Number"]);
        }
        return (["Success" => "Signup Successful"]);
    }

    public function login($data) {
        $file = $this->fileWithUserMobileNumber($data['mobileNum']);
        $json = file_get_contents($file);

        if(!$json) {
            return (["Failed" => "Please Signup First"]);
        }

        $jsonData = json_decode($json, true);
//        print_r($jsonData);

        if($data['username'] !== $jsonData['username'] ) {
            return(["Login Failed" => "Username is incorrect"]);
        }

        if ($data['password'] === $jsonData['password']) {
                return (["Success" => "You're logged in"]);
        }

        return(['Login Failed' => "Incorrect Password"]);
        }

    private function saveDetails($data) : bool {
        //saveDetails to JSON File
        $targetFile = $this->fileWithUserMobileNumber($data["mobileNum"]);
        if(file_exists($targetFile)) {
            return false;
        }
        $jsonData = json_encode($data);
        file_put_contents($targetFile, $jsonData);
        return true;
    }

    private function fileWithUserMobileNumber($mobileNum) : string {
        // Creates file with user's mobile Number
        $targetDir = getcwd() . "/details";
        $ext = '.json';
        $targetFile = $targetDir . "/" . "$mobileNum" . "$ext";
        return $targetFile;
    }

}