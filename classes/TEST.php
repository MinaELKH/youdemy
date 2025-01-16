<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
use classes\AbstractContent;
use classes\ContentVideo;
use classes\ContentText;
use config\DataBaseManager ; 

// Initialiser la connexion à la base de données
$dbManager = new DataBaseManager();

// Ajouter un contenu vidéo
$videoContent = new ContentVideo($dbManager);
$videoContent->setTitle("JS en testing");
$videoContent->setDuration(120);
$videoContent->setCourseId(33);
$videoContent->setUrl("https://example.com/video.mp4");
$videoContent->add();

// Ajouter un contenu texte
$textContent = new ContentText($dbManager);
$textContent->setTitle("Chapitre 2- les principe de js");
$textContent->setCourseId(33) ;
$textContent->setContent("Ceci est une introduction au cours PHP.");
$textContent->add();

// Afficher un contenu (peu importe le type)
function displayContent(AbstractContent $content) {
    $details = $content->getById();
    print_r($details);
}

displayContent($videoContent);
displayContent($textContent);
