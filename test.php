<?php
// Fonction pour uploader une vidéo
function uploadVideo($file, $uploadsDir = 'uploads/', $maxSize = 50 * 1024 * 1024, $allowedTypes = ['video/mp4', 'video/quicktime', 'video/x-msvideo', 'video/x-ms-wmv'])
{
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $videoTmpName = $file['tmp_name'];
        $videoName = basename($file['name']);
        $videoSize = $file['size'];
        $videoType = mime_content_type($videoTmpName);

        // Vérification du type
        if (!in_array($videoType, $allowedTypes)) {
            return ['success' => false, 'message' => "Type de fichier non supporté. Veuillez utiliser MP4, AVI, MOV ou WMV."];
        }

        // Vérification de la taille
        if ($videoSize > $maxSize) {
            return ['success' => false, 'message' => "Le fichier est trop volumineux. Limite de " . ($maxSize / (1024 * 1024)) . " Mo."];
        }

        // Création du chemin d'enregistrement avec un nom unique
        $videoPath = $uploadsDir . uniqid() . '-' . $videoName;
        // Déplacement du fichier
        if (move_uploaded_file($videoTmpName, 'pages/'.$videoPath)) {
            return ['success' => true, 'filePath' => $videoPath];
        } else {
            return ['success' => false, 'message' => "Erreur lors de l'upload de la vidéo."];
        }
    } else {
        return ['success' => false, 'message' => "Aucun fichier sélectionné ou erreur lors de l'upload."];
    }
}

// Fonction pour valider une URL YouTube
function isValidYouTubeURL($url)
{
    return preg_match('/(youtube.com\/watch\?v=|youtu.be\/)([a-zA-Z0-9_-]+)/', $url);
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['videoURL'])) {
        $youtubeURL = $_POST['videoURL'];
    } elseif (isset($_FILES['videoUpload'])) {
        $result = uploadVideo($_FILES['videoUpload']);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de vidéo ou URL YouTube</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload de vidéo ou URL YouTube</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Option 1 : Upload de vidéo -->
            <div class="form-group">
                <label for="videoUpload">Télécharger une vidéo</label>
                <input type="file" id="videoUpload" name="videoUpload" accept="video/*">
            </div>

            <!-- Option 2 : URL YouTube -->
            <div class="form-group">
                <label for="videoURL">Ou, collez une URL YouTube</label>
                <input type="url" id="videoURL" name="videoURL" placeholder="https://www.youtube.com/watch?v=exemple">
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn">Envoyer</button>
        </form>

        <!-- Affichage des messages -->
        <?php if (!empty($message)) : ?>
            <div class="message <?php echo (strpos($message, 'Erreur') === false) ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>