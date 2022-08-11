<?php

namespace Admin\Libs;

use PDO, PDOException;
use Exception;


class Departaments extends Database
{
    protected static $db_table = "departamentet";
    protected static $db_fields = array('did', 'emri', 'pershkrimi');

    protected $doc_emri;
    protected $doktorrat_mbiemri;
    protected $id;
    protected $did;
    protected $emri;
    protected $pershkrimi;
    protected $doktorrat_pershkrimi;
    protected $doktorrat_photo;

    function setDepartamenti_Id($id)
    {
        $this->id = $id;
    }
    function getDepartamenti_Id()
    {
        return $this->id;
    }
    function setDoktorrat_Id($did)
    {
        $this->did = $did;
    }
    function getDoktorrat_Id()
    {
        return $this->did;
    }
    function setDepartamenti_Emri($emri)
    {
        $this->emri = $emri;
    }
    function getDepartamenti_Emri()
    {
        return $this->emri;
    }
    function setPershkrimi($pershkrimi)
    {
        $this->pershkrimi = $pershkrimi;
    }
    function getPershkrimi()
    {
        return $this->pershkrimi;
    }
    function setDoktorri_Emri($emri)
    {
        $this->doc_emri = $emri;
    }
    function getDoktorri_Emri()
    {
        return $this->doc_emri;
    }
    function setDoktorri_Mbiemri($mbiemri)
    {
        $this->doktorrat_mbiemri = $mbiemri;
    }
    function getDoktorri_Mbiemri()
    {
        return $this->doktorrat_mbiemri;
    }
    function setDoc_Pershkrimi($pershkrimi)
    {
        $this->doktorrat_pershkrimi = $pershkrimi;
    }
    function getDoc_Pershkrimi()
    {
        return $this->doktorrat_pershkrimi;
    }
    function setDocPhoto($photo)
    {
        $this->doktorrat_photo = $photo;
    }
    function getDocPhoto()
    {
        return $this->doktorrat_photo;
    }


    public function queryInner()
    {
        $sql = "SELECT *, departamentet.id as id , doktorrat.id as did , doktorrat.emri as doc_emri , doktorrat.mbiemri as doktorrat_mbiemri , departamentet.emri as emri , departamentet.pershkrimi as pershkrimi FROM " .  static::$db_table;
        $sql .= " INNER JOIN doktorrat ON departamentet.did=doktorrat.id ";
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }

    public function Cardiology()
    {
        $sql = "SELECT * , doktorrat.emri as doc_emri , doktorrat.mbiemri as doktorrat_mbiemri , doktorrat.pershkrimi as doktorrat_pershkrimi,
        doktorrat.photo as doktorrat_photo , departamentet.emri as emri FROM departamentet INNER JOIN doktorrat ON
        departamentet.did = doktorrat.id WHERE departamentet.emri = 'Cardiology'";
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }

    public function Dentist()
    {
        $sql = "SELECT * , doktorrat.emri as doc_emri , doktorrat.mbiemri as doktorrat_mbiemri , doktorrat.pershkrimi as doktorrat_pershkrimi,
        doktorrat.photo as doktorrat_photo , departamentet.emri as emri FROM departamentet INNER JOIN doktorrat ON
        departamentet.did = doktorrat.id WHERE departamentet.emri = 'Dentist'";
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }
}
