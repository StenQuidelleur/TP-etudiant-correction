<?php

namespace App\Models;

use PDO;

/**
 * This class make a PDO object instanciation.
 */
class Connection
{
    /**
     * @var PDO
     */
    private PDO $connection;
    
    /**
     * @var string
     */
    private string $user = DB_USER;

    /**
     * @var string
     */
    private string $host = DB_HOST;

    /**
     * @var string
     */
    private string $password = DB_PASSWORD;

    /**
     * @var string
     */
    private string $database = DB_NAME;

    public function __construct()
    {
        $this->connection = new PDO(
            'mysql:host=' . $this->host . '; dbname=' . $this->database . '; charset=utf8',
            $this->user,
            $this->password
        );

        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * @return PDO
     */
    public function getconnection(): PDO
    {
        return $this->connection;
    }
}