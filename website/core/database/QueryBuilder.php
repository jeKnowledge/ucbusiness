<?php

class QueryBuilder {

    protected $pdo;
    protected $tables;

    public function __construct(PDO $pdo, $tables) {
        $this->pdo = $pdo;
        $this->tables = $tables;
    }

    public function selectAll($table, $class) {
        $query = "select * from ".$this->tables[$table];

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function insertEvent($table, $parameters) {
        $query = sprintf(
            "insert into %s (%s) values (%s)",
            $this->tables[$table],
            implode(', ', array_keys($parameters)),
            ':'.implode(', :', array_keys($parameters))
        );

        $statement = $this->pdo->prepare($query);
        $statement->execute($parameters);
    }

}
