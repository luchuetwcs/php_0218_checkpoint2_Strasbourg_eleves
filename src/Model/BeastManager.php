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

    public function beastCar($id)
    {
        $statement = $this->pdoConnection->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function beastPlanet($id)
    {
        $statement = $this->pdoConnection->prepare("SELECT beast.id, beast.name, beast.picture, beast.size, beast.area, beast.id_movie,beast.id_planet, planet.name as turtle FROM $this->table INNER JOIN planet ON beast.id_planet = planet.id WHERE beast.id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function beastMovie($id)
    {
        $statement = $this->pdoConnection->prepare("SELECT * FROM $this->table INNER JOIN movie ON beast.id_movie = movie.id WHERE beast.id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }


    public function addPerso($name,$area,$picture,$size)
    {
        $statement = $this->pdoConnection->prepare("INSERT INTO beast(name,area,picture,size) VALUES (:name,:area,:picture,:size) ");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':area', $area);
        $statement->bindValue(':picture', $picture);
        $statement->bindValue(':size', $size);
        $statement->execute();
    }

    public function addPlanet($name)
    {
        $statement = $this->pdoConnection->prepare("INSERT INTO planet(name) VALUES (:name) ");
        $statement->bindValue(':name', $name);
        $statement->execute();
    }

    public function addMovie($title)
    {
        $statement = $this->pdoConnection->prepare("INSERT INTO beast(title) VALUES (:title) ");
        $statement->bindValue(':title', $title);
        $statement->execute();
    }
}

