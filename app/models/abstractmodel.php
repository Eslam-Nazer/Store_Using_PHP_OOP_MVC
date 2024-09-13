<?php

namespace PHPMVC\Models;

use PHPMVC\Lib\Database\DatabaseHandler;
use SplObjectStorage;

class AbstractModel
{
    const DATA_TYPE_INT = \PDO::PARAM_INT;
    const DATA_TYPE_BOOL = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR = \PDO::PARAM_STR;
    const DATA_TYPE_DECIMAL = 4;
    const DATA_TYPE_DATE = 10; // On date formatted (Y:m:d)

    protected static $tableName;
    protected static $tableSchema;
    protected static $primaryKey;

    public static function bulidNameParameterSQL()
    {
        $nameParams = null;
        foreach (static::$tableSchema as $columnName => $type) {
            $nameParams .= $columnName . ' = :' . $columnName . ', ';
        }
        return trim($nameParams, ', ');
    }
    public function prapareValues(\PDOStatement &$stmt)
    {
        foreach (static::$tableSchema as $columnName => $type) {
            if ($type == 4) {
                $sanitizedValueDec = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":" . $columnName, $sanitizedValueDec);
            } elseif ($type == 10 && $this->$columnName != null) {
                $datePattern = '/^(19|20|30)\d\d[- \/.](0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01|02])$/';
                preg_match_all($datePattern, $this->$columnName, $m);
                $sanitizedValueDate = !empty($m) ? $m[0][0] : false;
                $stmt->bindValue(':' . $columnName, $sanitizedValueDate);
            } else {
                $stmt->bindValue(":" . $columnName, $this->$columnName, $type);
            }
        }
    }
    private function create()
    {
        try {
            $sql = "INSERT INTO " . static::$tableName . " SET " . static::bulidNameParameterSQL();
            $stmt = DatabaseHandler::factory()->prepare($sql);
            $this->prapareValues($stmt);
            if ($stmt->execute()) {
                $this->{static::$primaryKey} = DatabaseHandler::factory()->lastInsertId();
                return true;
            }
            return false;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    private function update()
    {
        try {

            $sql = "UPDATE " . static::$tableName . " SET " . static::bulidNameParameterSQL() . " WHERE " . static::$primaryKey . " = " . $this->{static::$primaryKey};
            $stmt = DatabaseHandler::factory()->prepare($sql);
            $this->prapareValues($stmt);
            return $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public function save($primaryKeyCheck = true)
    {
        if (false === $primaryKeyCheck) {
            return $this->create();
        }
        return $this->{static::$primaryKey} === null ? $this->create() : $this->update();
    }
    public function delete()
    {
        try {
            $sql = "DELETE FROM " . static::$tableName . " WHERE " . static::$primaryKey . " = " . $this->{static::$primaryKey};
            $stmt = DatabaseHandler::factory()->prepare($sql);
            return $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    public static function getAll()
    {
        $sql = "SELECT * FROM " . static::$tableName;
        $stmt = DatabaseHandler::factory()->prepare($sql);
        if ($stmt->execute() === true) {
            $result = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        }
        return is_array($result) && !empty($result) ? $result : false;
    }
    public static function getByPK($pk)
    {
        $sql = "SELECT * FROM " . static::$tableName . " WHERE " . static::$primaryKey . " = '" . $pk . "'";
        $stmt = DatabaseHandler::factory()->prepare($sql);
        if ($stmt->execute() === true) {
            $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
            return !empty($obj) ? array_shift($obj) : false;
        }
        return false;
    }
    public static function getBy($columns, $options = [])
    {
        $whereClauseColumns = array_keys($columns);
        $whereClauseValues = array_values($columns);
        $whereClause = [];
        for ($i = 0, $ii = count($whereClauseColumns); $i < $ii; $i++) {
            $whereClause[] = $whereClauseColumns[$i] . ' = "' . $whereClauseValues[$i] . '"';
        }
        $whereClause = implode(' AND ', $whereClause);
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ' . $whereClause;
        return static::get($sql, $options);
    }
    public static function get($sql, $options = array())
    {
        $stmt = DatabaseHandler::factory()->prepare($sql);
        if (!empty($options)) {
            foreach ($options as $nameParam => $type) {
                if ($type[0] == 4) {
                    $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $stmt->bindValue(":{$nameParam}", $sanitizedValue);
                } else {
                    $stmt->bindValue(":{$nameParam}", $type[1], $type[0]);
                }
            }
        }
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        return is_array($result) && !empty($result) ? $result : false;
    }

    public static function getOne($sql)
    {
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        return is_array($result) && !empty($result) ? $result[0] : false;
    }

    public static function getModelTableName()
    {
        return static::$tableName;
    }
}
