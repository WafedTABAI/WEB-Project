<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="stagiaires.php">Gestionnaire des stagiaires</a>
    </div>
    <ul class="nav navbar-nav navbar" style="margin-left:350px;">
      <li ><a href="stagiaires.php">Les stagiaires</a></li>
      <li><a href="filieres.php">Les filiéres</a></li>
      <li><a href="utilisateurs.php">Les utilisateurs</a></li>
      
    </ul>
      
      <ul class="nav navbar-nav navbar-right">
				<li>
					<a href="editUtilisateur.php?idUser=<?php echo $_SESSION['user']['idUser'];?>">
						<span class="glyphicon glyphicon-user"></span> 
						<?php echo $_SESSION['user']['login'];?>
					</a>
				</li>
				<li>
					<a href="SeDeconnecter.php">
						<span class="glyphicon glyphicon-log-out"></span>
						Se Deconnecter
					</a>
				</li>
			</ul>
  </div>
</nav>