<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if(isset($_GET['continent'])) {
  $continent = $_GET['continent'];
} else {
  $continent = 'Asia';
}
  
$desPays = getCountriesByContinent($continent);
?>

<main role="main" class="flex-shrink-0">
  <div class="container">
    <style>

      body {
        background-image: url(images/earthRotating.gif), url(images/galaxy.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: 75%, cover;
        background-attachment: fixed;
        color: white;
      }

      .table {
        color: white;
      }

    </style>
    <h1>Les pays en <?php echo $continent ?></h1>
    <div>
     <table class="table">
         <tr>
           <th>Nom</th>
           <th>Population</th>
           <th>Espérance de vie</th>
           <th>Superficie</th>
           <th>Capitale</th>
         </tr>
       <?php
       // $desPays est un tableau dont les éléments sont des objets représentant
       // des caractéristiques d'un pays (en relation avec les colonnes de la table Country)
          foreach ($desPays as $pays): ?>
          <tr>
            <td><?php echo $pays->Name ?></td>
            <td><?php echo $pays->Population ?></td>
            <td><?php echo $pays->LifeExpectancy ?></td>
            <td><?php echo $pays->SurfaceArea, " km" ?></td> 
            <td><?php if(empty($pays->Capital) == True) echo "Pas de capitale"; else echo getCapitale($pays->Capital) ?></td>
          </tr>
          <?php endforeach; ?>
     </table>
    </div>
    <p>
        <code>
      <?php
        //var_dump($desPays[0]);
      ?>
        </code>
    </p>
  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
