<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 04/05/18
 * Time: 11:53
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