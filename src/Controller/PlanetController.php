<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 04/05/18
 * Time: 12:33
 */
namespace Controller;

use Model\PlanetManager;

/**
 * Class ItemController
 */
class PlanetController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function list()
    {
        $planetManager = new PlanetManager();
        $planets = $planetManager->selectAll();


        return $this->twig->render('Planet/list.html.twig', ['planets' => $planets]);
    }
}