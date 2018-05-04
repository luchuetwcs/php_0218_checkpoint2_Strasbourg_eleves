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

    public function recupBeastPlanet($id)
    {
        $statement = $this->pdoConnection->prepare("SELECT DISTINCT beast.area, beast.size, planet.name FROM planet INNER JOIN $this->table ON planet.id=id_planet WHERE beast.id = :id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function recupBeastMovie($recup_id)
    {
        $requete = $this->pdoConnection->prepare("SELECT DISTINCT movie.title FROM movie INNER JOIN $this->table ON movie.id=id_movie WHERE beast.id = :id");
        $requete->bindValue(':id', $recup_id);
        $requete->execute();
        $infosBeastMovie = $requete->fetchAll();
        return $infosBeastMovie;
    }

}
