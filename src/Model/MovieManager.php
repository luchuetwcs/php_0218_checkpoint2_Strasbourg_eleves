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
}