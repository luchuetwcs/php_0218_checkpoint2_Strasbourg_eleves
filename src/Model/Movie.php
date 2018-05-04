<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 04/05/18
 * Time: 10:33
 */

namespace Model;

/**
 * Class Movie
 */
class Movie
{
    private $id;

    private $title;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}