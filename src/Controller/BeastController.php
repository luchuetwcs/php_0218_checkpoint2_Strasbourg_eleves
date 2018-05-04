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
    // TODO : A page which displays all details of a specific beasts.
      $beastsManager = new BeastManager();
      $details = $beastsManager->beastCar($id);
      var_dump($details);
      $beastsManager = new BeastManager();
      $planet = $beastsManager->beastPlanet($id);
      $beastsManager = new BeastManager();
      $movie = $beastsManager->beastMovie($id);

    return $this->twig->render('Beast/details.html.twig',['details' => $details,'planet' => $planet,'movie' => $movie]);
  }

  /**
  * Display item creation page
  *
  * @return string
  */
  public function add()
  {
    // TODO : A creation page where your can add a new beast.
      if (isset($_POST['Valider'])){}

    return $this->twig->render('Beast/add.html.twig');
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
