<?php

class Database
{
    private $pdo;

    public function __construct(string $username, string $password, string $dbname, ?string $host = 'localhost', ?int $port = 3306)
    {
        $this->pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $host . ':' . $port, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function query(string $query, array $params)
    {
        if ($params) {
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        } else {
            $req = $this->pdo->query($query);
        }

        return $req;
    }
}
