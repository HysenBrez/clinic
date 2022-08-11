<?php

namespace Admin\Libs;

use PDO, PDOException;
use Exception;


class Admins extends Database
{
    protected static $db_table = "adminat";
    protected static $db_fields = array("emri", "mbiemri", "email", "fjalekalimi");

    protected $id;
    protected $emri;
    protected $mbiemri;
    protected $email;
    protected $fjalekalimi;


    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }
    function setEmri($emri)
    {
        $this->emri = $emri;
    }
    function getEmri()
    {
        return $this->emri;
    }
    function setMbiemri($mbiemri)
    {
        $this->mbiemri = $mbiemri;
    }
    function getMbiemri()
    {
        return $this->mbiemri;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function getEmail()
    {
        return $this->email;
    }
    function setFjalekalimi($fjalekalimi)
    {
        $this->fjalekalimi = $fjalekalimi;
    }
    function getFjalekalimi()
    {
        return $this->fjalekalimi;
    }


    public function verifyUserAdmin($email, $fjalekalimi)
    {
        $sql = "SELECT * FROM adminat";
        $sql .= " WHERE email=:email AND fjalekalimi=:fjalekalimi";
        $result = $this->prepare($sql);
        $result->bindParam(':email', $email);
        $result->bindParam(':fjalekalimi', $fjalekalimi);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        return $result->fetch();
    }
}
