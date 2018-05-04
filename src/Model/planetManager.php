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
class planetManager extends AbstractManager
{
    const TABLE = 'planet';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
    public function selectAll(): array
    {
        return $this->pdoConnection->query("SELECT * FROM `$this->table`")
            ->fetchAll(\PDO::FETCH_CLASS, $this->className);

    }

}

