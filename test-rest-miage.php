<?php

  include("data.php");
  $start = microtime();
  
  $method = $_SERVER['REQUEST_METHOD'];
  $path   = $_SERVER['PATH_INFO'];
  
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json"); 
  
  switch ($method) {
    
    case 'GET':
      
      $str = '/mathematiques/';
      if (substr($path, 0, $len=strlen($str)) === $str) {
        $id = substr($path, $len);
        die(getNotesEtudiant("Mathématiques",$id));
      }

      // GET /bonjour/nom
      // ==> { 'output': 'Bonjour '. $nom .'!' }
      $str = '/mathematiques';
      if (substr($path, 0, $len=strlen($str)) === $str) {
        die(getNotes("Mathématiques"));
      }

      $str = '/svt/';
      if (substr($path, 0, $len=strlen($str)) === $str) {
        $id = substr($path, $len);
        die(getNotesEtudiant("SVT",$id));
      }

      $str = '/svt';
      if (substr($path, 0, $len=strlen($str)) === $str) {
        die(getNotes("svt"));
      }

      $str = '/français/';
      if (substr($path, 0, $len=strlen($str)) === $str) {
        $id = substr($path, $len);
        die(getNotesEtudiant("Français",$id));
      }

      $str = '/français';
      if (substr($path, 0, $len=strlen($str)) === $str) {
        die(getNotes("Français"));
      }

      $str = '/etudiants';
      if (substr($path, 0, $len=strlen($str)) === $str) {
        $id = substr($path, $len);
        die(getEtudiants());
      }
  }
  
  header('Status: 500 Internal error');
  