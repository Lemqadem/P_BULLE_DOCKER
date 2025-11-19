<?php
// index.php: simple formulaire
?>


<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Inscription utilisateur</title>
<style>
body{font-family: Arial, Helvetica, sans-serif; padding:20px}
label{display:block; margin-top:10px}
input, select{width:300px; padding:6px}
button{margin-top:12px;padding:8px 12px}
.message{margin-top:16px;padding:10px;border-radius:6px}
</style>
</head>
<body>
<h1>Inscription - Formulaire</h1>

<form action="save.php" method="POST">

<label>Prénom
  <input type="text" name="prenom" required maxlength="254">
</label>

<label>Nom
  <input type="text" name="nom" required maxlength="254">
</label>

<label>Repas préféré
  <input type="text" name="repas_prefere" required maxlength="254">
</label>

<label>Animal totem
  <input type="text" name="animal_totem" required maxlength="254">
</label>

<label>Email
  <input type="email" name="email" required maxlength="254">
</label>

<button type="submit">Envoyer</button>

</form>

</body>
</html>
