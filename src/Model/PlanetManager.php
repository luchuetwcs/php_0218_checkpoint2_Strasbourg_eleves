<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 04/05/18
 * Time: 12:28
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
}