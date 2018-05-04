<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 04/05/18
 * Time: 10:36
 */

namespace Model;

/**
 * Class MovieManager
 * @package Model
 */
class MovieManager extends AbstractManager
{
    const TABLE = 'movie';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectOneByTitle(string $title)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("SELECT * FROM `$this->table` WHERE title=:title");
        $statement->bindValue('title', $title, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}