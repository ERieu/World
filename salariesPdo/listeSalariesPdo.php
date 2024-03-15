<?php
  require_once('header.html');
  require_once('fonctionsPdo.php');

  $nbSalaries = getNbSalaries();
  $listeSalaries = getAllSalaries();
  $salaireAvg = getSalaireAvg();
  $salaireMin = getSalaireMin();
  $salaireMax = getSalaireMax();
  $nbSalariesService = getNbSalariesService();
?>

<div class="container my-5">
<table class="table table-hover">
  <th>id</th>
  <th>nom</th>
  <th>prenom</th>
  <th>date-naissance</th>
  <th>date-embauche</th>
  <th>salaire</th>
  <th>service</th>
<?php foreach ($listeSalaries as $leSalarie): ?>
  <tr>
    <td><?php echo $leSalarie->idsalaries; ?></td>
    <td><?php echo $leSalarie->nom; ?></td>
    <td><?php echo $leSalarie->prenom; ?></td>
    <td><?php echo $leSalarie->date_naissance; ?></td>
    <td><?php echo $leSalarie->date_embauche; ?></td>
    <td><?php echo $leSalarie->salaire; ?></td>
    <td><?php echo $leSalarie->service; ?></td>
    <td><a href=updateForm.php?id=".$row['idMessage'].">update</a></td>
  </tr>
<?php endforeach; ?>
</table>

<p>nombre de salariés :<?php echo $nbSalaries ; ?></p>
<p>salaire moyen :<?php echo $salaireAvg ; ?></p>
<p>salaire minimum :<?php echo $salaireMin ; ?></p>
<p>salaire maximum :<?php echo $salaireMax ; ?></p>
<p>
</div>

<?php require_once('footer.html'); ?>