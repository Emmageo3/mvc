<?php
session_start();
if(!isset($_SESSION['user_connected'])){
    header('location:../connexion');
}
?>
<!Doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des entreprises</title>
    <link rel="stylesheet" href="style" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Recensement</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../utilisateurs/add_organisation" class="btn btn-success">Ajouter une entreprise</a>
            </li>
            <li class="nav-item"> 
            <div class="nav-link"><?=$_SESSION['user_connected']['prenom'].' '.$_SESSION['user_connected']['nom'];?> </div>
            </li>
            <li class="nav-item">
            <a href="../utilisateurs/logout" class="btn btn-danger">Déconnexion</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

<div class="container mt-4">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nom de l'entreprise</th>
      <th scope="col">Ninea</th>
      <th scope="col">Registre de commerce</th>
      <th scope="col">Date de creation</th>
      <th scope="col">Site Web</th>
      <th scope="col">Organigramme</th>
      <th scope="col">Prenom et nom Repondant</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($_SESSION['all'] as $entreprise){?>
        <tr>
            <td><?= $entreprise['nom_entreprise']; ?></td>
            <td><?= $entreprise['ninea']; ?></td>
            <td><?= $entreprise['rccm']; ?></td>
            <td><?= $entreprise['date_creation']; ?></td>
            <td><?= $entreprise['page_web']; ?></td>
            <td><?= $entreprise['organigramme']; ?></td>
            <td><?= $entreprise['prenom_repondant'].' '.$entreprise['nom_repondant']; ?></td>
            <td><a class="btn btn-success" href=<?='update/'.$entreprise['id_entreprise']?> >Modifier</a></td>
            <td><a class="btn btn-danger" href="<?='delete/'.$entreprise['id_entreprise']?>">Supprimer</a></td>
        </tr>
      <?php } ?>

  </tbody>
</table>
      </div>
</body>
</html>
