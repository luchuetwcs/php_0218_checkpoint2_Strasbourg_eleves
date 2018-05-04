<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 04/05/18
 * Time: 10:37
 */

namespace Model;

/**
 * Class PlanetManager
 * @package Model
 */
class PlanetManager extends AbstractManager
{
    const TABLE = 'planet';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectOneByName(string $name)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("SELECT * FROM `$this->table` WHERE name=:name");
        $statement->bindValue('name', $name, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}