<?php
class DAO {
    // member variable
    private $conn=null;
    private static $DAO=null;
    // constructor
    public function __construct()
    {
        $this->$conn = new mysqli(
            "*",
            "*",
            "*",
            "*"
        );
        // Check connection
        if ($this->$conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    function insert($table,$values) {
        try {
            $format='insert into %s values (%s)';
            $insert=sprintf($format,$table,$values);
            echo $insert;
            ($this->$conn)->query($insert);
        }
        catch (Exception $e) {
            return $e;
        } finally {
            return "success";
        }

    }
    // static method
    function select($cols,$table,$option) {
        $format='select %s from %s where %s';
        $select=sprintf($format,$cols,$table,$option);
        return ($this->$conn)->query($select);
    }

    function update($cols,$table,$option) {
        try {
            $format='update %s set %s where %s';
            $update=sprintf($format,$cols,$table,$option);
            ($this->$conn)->query($update);
        }
        catch (Exception $e) {
            return $e;
        } finally {
            return "success";
        }
    }
    function delete($table,$option) {
        try {
            $format='delete from %s where %s';
            $delete=sprintf($format,$table,$option);
            ($this->$conn)->query($delete);
        }
        catch (Exception $e) {
            return $e;
        } finally {
            return "success";
        }
    }
    function close() {
        $this->$conn->close();
    }
    public static function factory()
    {
        if (self::$DAO == null) {
            self::$DAO = new DAO();
        }

        return self::$DAO;
    }
}
?>