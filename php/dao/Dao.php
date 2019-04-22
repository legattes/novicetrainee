<?php
require_once "Connection.php";

class DAO
{
    protected $connection;

    public function __construct()
    {
        $this->connection = (new Connection())->connect();
    }

    public function save($table, $post, $select = null, $where = null)
    {
        if ($where == null) {
            return $this->_insert($table, $post, $select);
        } else {
            return $this->_update($table, $post, $where);
        }
    }

    public function get($table, $id = null)
    {
        return $this->_select($table, $id);
    }

    protected function _exec($query)
    {
        $result = [];

        if (!($queryResult = mysqli_query($this->connection, $query))) {
            header('HTTP/1.1 500 FAIL');
            return $result;
        }

        while ($row = mysqli_fetch_assoc($queryResult)) {
            foreach ($row as $key => $column) {
                $item[$key] = $column;
            }

            array_push($result, (object) $item);
        }

        header('HTTP/1.1 200 OK');
        return $result;
    }

    protected function _select($table, $id = null)
    {
        $query = "SELECT * FROM " . $table;

        if ($id != null) {
            $query .= " WHERE " . $table . "_id = '" . $id . "'";
        }

        return $this->_exec($query);
    }

    protected function getIdAfterInsert($table)
    {
        $query = "SELECT * FROM {$table} ORDER BY {$table}_id DESC LIMIT 1";

        return $this->_exec($query);
    }

    protected function _update($table, $post, $where)
    {
        $query = "UPDATE {$table} SET " . $this->params($post) . " WHERE " . $this->params($where);

        if (mysqli_query($this->connection, $query)) {
            header('HTTP/1.1 200 OK');
            return true;
        } else {
            header('HTTP/1.1 500 FAIL');
            return false;
        }
    }

    protected function _insert($table, $post, $select = false)
    {
        $query = "INSERT INTO {$table} (" . $this->insertables($post) . ") values(" . $this->values($post) . ")";

        if (mysqli_query($this->connection, $query)) {
            header('HTTP/1.1 200 OK');
            if ($select == true) {
                return $this->getIdAfterInsert($table);
            } else {
                return true;
            }
        } else {
            header('HTTP/1.1 500 FAIL');
            return false;
        }
    }

    protected function params($params)
    {
        $result = '';

        foreach ($params as $key => $param) {
            $result .= "{$key} = '{$param}',";
        }

        return substr($result, 0, -1);
    }

    protected function insertables($params)
    {
        $result = '';

        foreach ($params as $key => $param) {
            $result .= "{$key},";
        }

        return substr($result, 0, -1);
    }

    protected function values($params)
    {
        $result = '';

        foreach ($params as $param) {
            $result .= "'{$param}',";
        }

        return substr($result, 0, -1);
    }
}
