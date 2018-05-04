<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 04/05/18
 * Time: 11:49
 */

namespace Controller;

use Model\MovieManager;

/**
 * Class ItemController
 */
class MovieController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function list()
    {
        $moviesManager = new MovieManager();
        $movies = $moviesManager->selectAll();


        return $this->twig->render('Movie/list.html.twig', ['movies' => $movies]);
    }
}