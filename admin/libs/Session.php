<?php

namespace Admin\Libs;

class Session
{
    private $signedIn = false;
    public $userId;
    public $doctorId;
    public $adminId;
    public $message;
    public $emri;
    public $mbiemri;

    public function __construct()
    {
        session_start();
        $this->checkLogin();
        $this->checkLoginDoc();
        $this->checkLoginAdmin();
        $this->checkMessage();
    }
    public function isSignedIn()
    {
        return $this->signedIn;
    }
    public function checkLogin()
    {
        if (isset($_SESSION['userId'])) {
            $this->userId = $_SESSION['userId'];
            $this->signedIn = true;
        } else {
            unset($this->userId);
            $this->signedIn = false;
        }
    }
    public function checkLoginDoc()
    {
        if (isset($_SESSION['doctorId'])) {
            $this->doctorId = $_SESSION['doctorId'];
            $this->signedIn = true;
        } else {
            unset($this->doctorId);
            $this->signedIn = false;
        }
    }
    public function checkLoginAdmin()
    {
        if (isset($_SESSION['doctorId'])) {
            $this->doctorId = $_SESSION['doctorId'];
            $this->signedIn = true;
        } else {
            unset($this->doctorId);
            $this->signedIn = false;
        }
    }

    public function login($user)
    {
        if ($user) {
            $this->userId = $_SESSION['userId'] = $user->getId();
            $this->emri = $_SESSION['emri'] = $user->getEmri();
            $this->mbiemri = $_SESSION['mbiemri'] = $user->getMbiemri();
            $this->signedIn = true;
        }
    }
    public function loginDoc($user)
    {
        if ($user) {
            $this->doctorId = $_SESSION['doctorId'] = $user->getId();
            $this->emri = $_SESSION['emri'] = $user->getEmri();
            $this->mbiemri = $_SESSION['mbiemri'] = $user->getMbiemri();
            $this->signedIn = true;
        }
    }
    public function loginAdmin($user)
    {
        if ($user) {
            $this->adminId = $_SESSION['adminId'] = $user->getId();
            $this->emri = $_SESSION['emri'] = $user->getEmri();
            $this->mbiemri = $_SESSION['mbiemri'] = $user->getMbiemri();
            $this->signedIn = true;
        }
    }

    public function logout()
    {
        unset($_SESSION['userId']);
        unset($this->userId);
        $this->signedIn = false;
    }
    public function logoutDoc()
    {
        unset($_SESSION['doctorId']);
        unset($this->doctorId);
        $this->signedIn = false;
    }
    public function logoutAdmin()
    {
        unset($_SESSION['adminId']);
        unset($this->adminId);
        $this->signedIn = false;
    }


    public function message($msg = "")
    {
        if (!empty($msg)) {
            $this->message = $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }
    public function checkMessage()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
}
