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
      $beastsManager = new BeastManager();
      $beast = $beastsManager->selectOneById($id);

    return $this->twig->render('Beast/details.html.twig', ['beast'=>$beast]);
  }

  /**
  * Display item creation page
  *
  * @return string
  */
  public function add()
  {
    $beastManager = new BeastManager();
    $planetManager = new PlanetManager();
    $movieManager = new MovieManager();
    $data=[];
    $errors =[];
    $select['planet']="";
    $select['movie']="";
    if (isset($_POST['Valider'])){

        //Name checking
        if ($_POST['name']!=""){
            $data['name'] = $_POST['name'];
        }
        else {
            $errors[] = 'Please enter Beast name.';
        }

        //Area checking
        if ($_POST['area']!=""){
            $data['area'] = $_POST['area'];
        }
        else {
            $errors[] = 'Please enter Beast area.';
        }

        //Picture checking
        if ($_POST['picture']!=""){
            $data['picture'] = $_POST['picture'];
        }
        else {
            $errors[] = 'Please enter Beast picture URL.';
        }

        //Size checking
        if ($_POST['size']!=""){
            $data['size'] = $_POST['size'];
        }
        else {
            $errors[] = 'Please enter Beast size.';
        }

        //Planet checking
        if ($_POST['planet']!=""){
            $data['id_planet'] = $_POST['planet'];
            $select['planet']=$_POST['planet'];
        }
        else {
            $select['planet'] = "";
            $errors[] = 'Please choose Beast planet.';
        }

        //Movie checking
        if ($_POST['movie']!=""){
            $data['id_movie'] = $_POST['movie'];
            $select['movie']=$_POST['movie'];
        }
        else {
            $select['movie'] = "";
            $errors[] = 'Please choose Beast movie.';
        }

        //Insertion BDD
        if (count($errors)==0){
            $ok = $beastManager->insert($data);
            if ($ok){
                header('Location: /beasts');
            }
            else {
                $errors[] = 'Erreur d\'insertion dans la base de donnée.';
            }
        }
    }

    $planets = $planetManager->selectAll();
    $movies = $movieManager->selectAll();

    return $this->twig->render('Beast/add.html.twig',
        ['planets'=>$planets,
            'movies'=>$movies,
            'data'=>$data,
            'select'=>$select,
            'errors'=>$errors]);
  }
  /**
  * Display item creation page
  *
  * @return string
  */
  public function edit(int $id)
  {
      $beastManager = new BeastManager();
      $planetManager = new PlanetManager();
      $movieManager = new MovieManager();
      $data=$beastManager->selectOneById($id);
      var_dump($data);
      $errors =[];
      $select['planet']=$data->id_planet;
      $select['movie']=$data->id_movie;
      if (isset($_POST['Valider'])){
          $data=[];
          //Name checking
          if ($_POST['name']!=""){
              $data['name'] = $_POST['name'];
          }
          else {
              $errors[] = 'Please enter Beast name.';
          }

          //Area checking
          if ($_POST['area']!=""){
              $data['area'] = $_POST['area'];
          }
          else {
              $errors[] = 'Please enter Beast area.';
          }

          //Picture checking
          if ($_POST['picture']!=""){
              $data['picture'] = $_POST['picture'];
          }
          else {
              $errors[] = 'Please enter Beast picture URL.';
          }

          //Size checking
          if ($_POST['size']!=""){
              $data['size'] = $_POST['size'];
          }
          else {
              $errors[] = 'Please enter Beast size.';
          }

          //Planet checking
          if ($_POST['planet']!=""){
              $data['id_planet'] = $_POST['planet'];
              $select['planet']=$_POST['planet'];
          }
          else {
              $select['planet'] = "";
              $errors[] = 'Please choose Beast planet.';
          }

          //Movie checking
          if ($_POST['movie']!=""){
              $data['id_movie'] = $_POST['movie'];
              $select['movie']=$_POST['movie'];
          }
          else {
              $select['movie'] = "";
              $errors[] = 'Please choose Beast movie.';
          }

          //Insertion BDD
          if (count($errors)==0){
              $ok = $beastManager->update($id,$data);
              if ($ok){
                  $data = $beastManager->selectOneById($id);;
              }
              else {
                  $errors[] = 'Erreur d\'insertion dans la base de donnée.';
              }
          }
      }
      if (isset($_POST['delete'])){
          $ok = $beastManager->delete($id);
          if ($ok){
              header('location:/beasts');
          }
          else{
              $errors='Erreur pendant la suppression';
          }
      }

      $planets = $planetManager->selectAll();
      $movies = $movieManager->selectAll();


    return $this->twig->render('Beast/edit.html.twig',
    ['planets'=>$planets,
            'movies'=>$movies,
            'data'=>$data,
            'select'=>$select,
            'errors'=>$errors]);
  }
}
