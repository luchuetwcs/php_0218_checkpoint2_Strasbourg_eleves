<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\BeastManager;
use Model\MovieManager;
use Model\PlanetManager;

/**
 * Class ItemController
 */
class BeastController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function list()
    {
        $beastsManager = new BeastManager();
        $beasts = $beastsManager->selectAll();
        return $this->twig->render('Beast/list.html.twig', ['beasts' => $beasts]);
    }

    /**
     * Display item informations specified by $id
     *
     * @param int $id
     *
     * @return string
     */
    public function details(int $id)
    {
        $beastManager = new BeastManager();
        $beast = $beastManager->selectOneById($id);
        $creature = (array) $beast;

        $movieManager = new MovieManager();
        $movie = $movieManager->selectOneById($creature['id_movie']);

        $planetManager = new PlanetManager();
        $planet = $planetManager->selectOneById($creature['id_planet']);
        return $this->twig->render('Beast/details.html.twig', ['beast' => $beast, 'movie' => $movie, 'planet' => $planet]);
    }

    /**
     * Display item creation page
     *
     * @return string
     */
    public function add()
    {
        $moviesManager = new MovieManager();
        $movies = $moviesManager->selectAll();

        $planetsManager = new PlanetManager();
        $planets = $planetsManager->selectAll();

        return $this->twig->render('Beast/add.html.twig', ['planets' => $planets, 'movies' => $movies]);
    }

    public function post_add()
    {
        var_dump($_POST);
        $name=$_POST['name'];
        $area = $_POST['area'];
        $picture=$_POST['picture'];
        $size=$_POST['size'];
        echo "<br><br>";

        $planetManager = new PlanetManager();
        $planet = $planetManager->selectOneByName($_POST['planet']);
        $planetId = $planet['id'];

        $idMovie = $_POST['movies'][0];

        $beastManager = new BeastManager();
        $beastManager->insert($name, $area, $picture, $size, $planetId, $idMovie);

        return header('location:/beasts');
    }


    /**
     * Display item creation page
     *
     * @return string
     */
    public function edit()
    {
        // TODO : An edition page where your can add a new beast.
        return $this->twig->render('Beast/edit.html.twig');
    }
}
