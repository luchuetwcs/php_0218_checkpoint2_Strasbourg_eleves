<?php
/**
* Created by PhpStorm.
* User: wcs
* Date: 11/10/17
* Time: 16:07
* PHP version 7
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
