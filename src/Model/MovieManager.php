<?php
/**
 * Created by PhpStorm.
 * User: coralie
 * Date: 04/05/18
 * Time: 11:20
 */

namespace Model;

/**
 * Class BeastManager
 * @package Model
 */
class MovieManager extends AbstractManager
{
    const TABLE = 'movie';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    public function getMovies()
    {
        $statement = $this->conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}