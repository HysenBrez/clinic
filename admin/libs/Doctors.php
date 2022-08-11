<?php

namespace Admin\Libs;

use PDO;
use Exception;
use PDOException;

class Doctors extends Database
{
    use UploadPhoto;
    protected static $db_table = "doktorrat";
    protected static $db_fields = array('emri', 'mbiemri', 'nr_telefoni', 'email', 'fjalekalimi', 'photo', 'pershkrimi');
    protected $id;
    protected $emri;
    protected $mbiemri;
    protected $nr_telefoni;
    protected $email;
    protected $fjalekalimi;
    protected $photo;
    protected $photoImage;
    protected $pershkrimi;

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
    function setNr_telefoni($nr_telefoni)
    {
        $this->nr_telefoni = $nr_telefoni;
    }
    function getNr_telefoni()
    {
        return $this->nr_telefoni;
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
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhotoImage($photoImage)
    {
        $this->photoImage = $photoImage;
    }
    public function getPhotoImage()
    {
        return $this->photoImage;
    }
    public function setPershkrimi($pershkrimi)
    {
        $this->pershkrimi = $pershkrimi;
    }
    public function getPershkrimi()
    {
        return $this->pershkrimi;
    }

    public function verifyUserDoc($email, $fjalekalimi)
    {
        $sql = "SELECT * FROM doktorrat";
        $sql .= " WHERE email=:email AND fjalekalimi=:fjalekalimi";
        $result = $this->prepare($sql);
        $result->bindParam(':email', $email);
        $result->bindParam(':fjalekalimi', $fjalekalimi);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        return $result->fetch();
    }

    public function create()
    {
        try {
            $this->startupLoad($this->photoImage);
            $this->photo = $this->filename;
            $uploadFile = $this->uploadFile();
            if ($uploadFile) {
                if (parent::create()) {
                    return true;
                }
            } else {
                foreach ($this->errors as $error) {
                    echo $error . "<br>";
                }
            }
        } catch (Exception $e) {
            echo "Doctor " . $e->getMessage();
        }
    }
    public function update()
    {
        try {
            if (isset($this->photoImage)) {
                $this->uploadfile = $this->src . $this->photo;
                unlink($this->uploadfile);
                $this->startupLoad($this->photoImage);
                $this->photo = $this->filename;
                $uploadFile = $this->uploadFile();
                if ($uploadFile) {
                    if (parent::update()) {
                        return true;
                    }
                } else {
                    foreach ($this->errors as $error) {
                        echo $error . "<br>";
                    }
                }
            } else {
                if (parent::update()) {
                    return true;
                }
            }
        } catch (Exception $e) {
            echo "User " . $e->getMessage();
        }
    }
    public function delete()
    {
        try {
            if (parent::delete()) {
                $this->uploadfile = $this->src . $this->photo;
                unlink($this->uploadfile);
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "User " . $e->getMessage();
        }
    }



    /** Funksionet per ndarjen e doktorrave sipas departamenteve */
}
