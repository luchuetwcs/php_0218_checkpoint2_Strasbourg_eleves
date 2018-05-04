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
    public function selectAll(): array
    {
        return $this->pdoConnection->query("select beast.id, beast.name, picture, size, area,movie.title,planet.name as NamePlanet from `$this->table`
inner join planet on beast.id_planet = planet.id inner join movie on beast.id_movie = movie.id ")
            ->fetchAll(\PDO::FETCH_CLASS, $this->className);

    }
    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("select beast.id, beast.name, picture, size, area,movie.title,planet.name as NamePlanet from `$this->table`
inner join planet on beast.id_planet = planet.id inner join movie on beast.id_movie = movie.id WHERE beast.id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function insert($data)
    {
        $columns = "";
        $values = "";
        foreach ($data as $column => $value){
            $columns .= $column.', ';
            $values .= '"'.$value.'", ';
        }
        $columns=substr($columns, 0, strlen($columns)-2);
        $values=substr($values, 0, strlen($values)-2);
        $statement = $this->conn->prepare('INSERT INTO '.$this->table.' ('.$columns.') VALUES ('.$values.')');

        return $statement->execute();

    }


}

