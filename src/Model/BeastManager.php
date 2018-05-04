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

    public function insert($name, $area, $picture, $size, $id_planet, $id_movie)
    {
        $statement = $this->pdoConnection->prepare("INSERT INTO `$this->table`(name, area, picture, size, id_planet, id_movie) VALUES (:name, :area, :picture, :size, :id_planet, :id_movie)");
        $statement->bindValue(':name', $name, \PDO::PARAM_STR);
        $statement->bindValue(':area', $area, \PDO::PARAM_STR);
        $statement->bindValue(':picture', $picture, \PDO::PARAM_STR);
        $statement->bindValue(':size', $size, \PDO::PARAM_STR);
        $statement->bindValue(':id_planet', $id_planet, \PDO::PARAM_STR);
        $statement->bindValue(':id_movie', $id_movie, \PDO::PARAM_STR);
        $statement->execute();

    }
}
