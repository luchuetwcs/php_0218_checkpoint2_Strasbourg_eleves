<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

/**
 * Class BeastManager
 * @package Model
 */
class BeastManager extends AbstractManager
{
    const TABLE = 'beast';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function displayBeast($GetId)
    {
        $statement = $this->pdoConnection->prepare("SELECT * FROM $this->table LEFT JOIN movie on beast.id_movie=movie.id  LEFT JOIN planet ON beast.id_planet=planet.id WHERE beast.id=$GetId");
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function addBeast()
    {
        $statement = $this->conn->prepare("INSERT INTO Beast(name,picture,size,area, id_movie, id_planet) VALUES (:name,:picture,:size,:area,:id_movie, :id_planet) ");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':area', $area);
        $statement->bindValue(':id_movie', $id_planet);

        $statement->execute();
    }
}
