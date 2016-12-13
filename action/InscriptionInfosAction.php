<?php

	require_once("action/CommonAction.php");
	require_once("dao/UserDAO.php");
	require_once("dao/QuestionDAO.php");

	class InscriptionInfosAction extends CommonAction{

		public $listeQuestions = array();

		public function __construct(){

			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction(){

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
				if(!empty($_POST["nom"]) &&
					!empty($_POST["prenom"]) &&
					!empty($_POST["courriel"]) &&
					!empty($_POST["reponse"]) &&
					!empty($_POST["password"]) &&
					!empty($_POST["passwordConfirm"])){

					if($_POST["password"] === $_POST["passwordConfirm"]){

						UserDAO::ajouter($_POST["nom"], $_POST["prenom"], $_POST["courriel"], $_POST["question"], $_POST["reponse"],$_POST["password"]);

						header("location:inscriptionComptes.php");
						exit;
					}
				}
			}

			$this->listeQuestions = QuestionDAO::listerQuestions();
		}
	}