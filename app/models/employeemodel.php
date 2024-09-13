<?php

namespace PHPMVC\Models;

class EmployeeModel extends AbstractModel {
    private $name;
    private $age;
    private $address;
    private $salary;
    private $tax;
    private $gender;
    private $type_of_work;
    private $windows;
    private $linux;
    private $mac;
    private $notes;

    protected static $tableName = 'employees';
    protected static $tableSchema = array(
        'name'      => self::DATA_TYPE_STR,
        'age'       => self::DATA_TYPE_INT,
        'address'   => self::DATA_TYPE_STR,
        'salary'    => self::DATA_TYPE_DECIMAL,
        'tax'       => self::DATA_TYPE_DECIMAL,
        'gender'    => self::DATA_TYPE_STR,
        'type_of_work'  => self::DATA_TYPE_STR,
        'windows'   => self::DATA_TYPE_BOOL,
        'linux'     => self::DATA_TYPE_BOOL,
        'mac'       => self::DATA_TYPE_BOOL,
        'notes'     => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'id';

    public function __construct($name, $age, $address, $salary, $tax, $gender, $type_of_work, $windows, $linux, $mac, $notes)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->salary = $salary;
        $this->tax = $tax;
        $this->gender = $gender;
        $this->type_of_work = $type_of_work;
        $this->windows = $windows;
        $this->linux   = $linux;
        $this->mac = $mac;
        $this->notes = $notes;
    }
    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}