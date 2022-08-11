<?php

namespace Admin\Libs;

use PDO;
use Exception;
use PDOException;


class Reservations extends Database
{
    protected static $db_table = "rezervimet";
    protected static $db_fields = array('did', 'pid', 'data_e_rezervimit', 'pershkrimi');

    protected $id;
    protected $did;
    protected $pid;
    protected $data_e_rezervimit;
    protected $pershkrimi;
    protected $pacientet_emri;
    protected $pacientet_mbiemri;
    protected $doktorrat_emri;
    protected $doktorrat_mbiemri;
    protected $doktorrat_photo;
    protected $departamentet_emri;

    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }
    function setDid($did)
    {
        $this->did = $did;
    }
    function getDid()
    {
        return $this->did;
    }
    function setPid($pid)
    {
        $this->pid = $pid;
    }
    function getPid()
    {
        return $this->pid;
    }
    function setData_e_rezervimit($data_e_rezervimit)
    {
        $this->data_e_rezervimit = $data_e_rezervimit;
    }
    function getData_e_rezervimit()
    {
        return $this->data_e_rezervimit;
    }
    function setPershkrimi($pershkrimi)
    {
        $this->pershkrimi = $pershkrimi;
    }
    function getPershkrimi()
    {
        return $this->pershkrimi;
    }
    function setPacientet_emri($pacientet_emri)
    {
        $this->pacientet_emri = $pacientet_emri;
    }
    function getPacientet_emri()
    {
        return $this->pacientet_emri;
    }
    function setPacientet_mbiemri($pacientet_mbiemri)
    {
        $this->pacientet_mbiemri = $pacientet_mbiemri;
    }
    function getPacientet_mbiemri()
    {
        return $this->pacientet_mbiemri;
    }
    function setDoktorrat_emri($doktorrat_emri)
    {
        $this->doktorrat_emri = $doktorrat_emri;
    }
    function getDoktorrat_emri()
    {
        return $this->doktorrat_emri;
    }
    function setDoktorrat_mbiemri($doktorrat_mbiemri)
    {
        $this->doktorrat_mbiemri = $doktorrat_mbiemri;
    }
    function getDoktorrat_mbiemri()
    {
        return $this->doktorrat_mbiemri;
    }
    function setDoktorrat_photo($photo)
    {
        $this->doktorrat_photo = $photo;
    }
    function getDoktorrat_photo()
    {
        return $this->doktorrat_photo;
    }
    function setDoktorrat_pershkrimi($pershkrimi)
    {
        $this->doktorrat_pershkrimi = $pershkrimi;
    }
    function getDoktorrat_pershkrimi()
    {
        return $this->doktorrat_pershkrimi;
    }
    function setDepartamentet_emri($emri)
    {
        $this->departamentet_emri = $emri;
    }
    function getDepartament_emri()
    {
        return $this->departamentet_emri;
    }

    public function PacientQuery()
    {
        if (isset($_SESSION['userId'])) {
            $pacientetid = $_SESSION['userId'];
        }
        if (isset($_SESSION['doctorId'])) {
            $doctorid = $_SESSION['doctorId'];
        }
        $sql = "SELECT * , rezervimet.id as id , pacientet.id as pid , doktorrat.id as did , rezervimet.pershkrimi as pershkrimi , pacientet.emri as pacientet_emri , pacientet.mbiemri as pacientet_mbiemri , doktorrat.emri as doktorrat_emri , doktorrat.mbiemri as doktorrat_mbiemri FROM rezervimet INNER JOIN doktorrat ON rezervimet.did = doktorrat.id
        INNER JOIN pacientet ON rezervimet.pid = pacientet.id";
        if (isset($_SESSION['userId'])) {
            $sql .= " WHERE pacientet.id = $pacientetid";
        }
        if (isset($_SESSION['doctorId'])) {
            $sql .= " WHERE doktorrat.id = $doctorid";
        }
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }

    public function ResQuery()
    {
        $sql = "SELECT * , rezervimet.id as id , pacientet.id as pid , doktorrat.id as did , rezervimet.pershkrimi as pershkrimi , pacientet.emri as pacientet_emri , pacientet.mbiemri as pacientet_mbiemri , doktorrat.emri as doktorrat_emri , doktorrat.mbiemri as doktorrat_mbiemri FROM rezervimet INNER JOIN doktorrat ON rezervimet.did = doktorrat.id
        INNER JOIN pacientet ON rezervimet.pid = pacientet.id";
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }

    public function Dentist()
    {
        $sql = "SELECT * , doktorrat.emri as doktorrat_emri , doktorrat.mbiemri as doktorrat_mbiemri , doktorrat.pershkrimi as doktorrat_pershkrimi,
        doktorrat.photo as doktorrat_photo , departamentet.emri as emri FROM departamentet INNER JOIN doktorrat ON
        departamentet.did = doktorrat.id WHERE departamentet.emri = 'Dentist'";
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }

    public function Cardiology()
    {
        $sql = "SELECT * , doktorrat.emri as doktorrat_emri , doktorrat.mbiemri as doktorrat_mbiemri , doktorrat.pershkrimi as doktorrat_pershkrimi,
        doktorrat.photo as doktorrat_photo , departamentet.emri as emri FROM departamentet INNER JOIN doktorrat ON
        departamentet.did = doktorrat.id WHERE departamentet.emri = 'Cardiology'";
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }

    public function Neurologist()
    {
        $sql = "SELECT * , doktorrat.emri as doktorrat_emri , doktorrat.mbiemri as doktorrat_mbiemri , doktorrat.pershkrimi as doktorrat_pershkrimi,
        doktorrat.photo as doktorrat_photo , departamentet.emri as emri FROM departamentet INNER JOIN doktorrat ON
        departamentet.did = doktorrat.id WHERE departamentet.emri = 'Neurologist'";
        $result = $this->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
    }
}
