<?php

class QueryBuilder {

    protected $pdo;
    protected $tables;

    public function __construct(PDO $pdo, $tables) {
        $this->pdo = $pdo;
        $this->tables = $tables;
    }

    public function insert($table, $parameters) {
        $query = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->tables[$table],
            implode(', ', array_keys($parameters)),
            ':'.implode(', :', array_keys($parameters))
        );

        $statement = $this->pdo->prepare($query);
        $statement->execute($parameters);
    }

    public function update($table, $parameters, $where) {
        $query = sprintf(
            "UPDATE %s SET %s WHERE %s",
            $table,
            implode(', ', $parameters),
            $where
        );

        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    public function remove($table, $where) {
        $query = sprintf(
            "DELETE FROM %s WHERE %s",
            $table,
            $where
        );

        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    public function selectAll($table, $order) {
        $query = "select * from ".$this->tables[$table];

        if ($order) {
            $query = $query." order by ".$order;
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function select($table, $where, $order, $limit) {
        $query = "select * from ".$this->tables[$table];

        if ($where) {
            $query = $query." where ".$where;
        }
        if ($order) {
            $query = $query." order by ".$order;
        }
        if ($limit) {
            $query = $query." limit ".$limit;
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectCustom($query) {
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($table, $attribute, $value) {
        $query = sprintf(
            'select * from %s where %s="%s"',
            $this->tables[$table],
            $attribute,
            $value
        );

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_OBJ);
    }
}

?>
