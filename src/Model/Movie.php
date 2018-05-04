<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 04/05/18
 * Time: 11:59
 */
namespace Model;

/**
 * Class Item
 */
class Movie
{
    private $id;

    private $title;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Beast
     */
    public function setId($id): Movie
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $name
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}