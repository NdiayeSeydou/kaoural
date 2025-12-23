<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bienvenue chez Too Good</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8f0;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: violet;
        }

        a {
            display: block;
            background: violet;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Bonjour {{ $user['name'] }},</h2>

        <p>Merci de vous être inscrit sur <strong>Too Good</strong>, votre pâtisserie en ligne !</p>
        <p>Nous sommes ravis de vous accueillir dans notre communauté de gourmands.</p>
        <h4>Ce que vous pouvez faire :</h4>
        <ul>
            <li>Explorer notre catalogue de douceurs sucrées</li>
            <li>Passer vos commandes en ligne, en toute sécurité</li>
            <li>Suivre vos commandes depuis votre espace client</li>
        </ul>
        <p>Besoin d’aide ? N’hésitez pas à nous contacter !</p>
        <p>À très bientôt,<br>L’équipe Too Good</p>
    </div>
</body>

</html>
