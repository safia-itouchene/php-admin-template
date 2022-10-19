<div class="admin_compte">
<?php
require 'inc/db.php';
$_SESSION["id"] = 1; // User's session
$sessionId = $_SESSION["id"];
$user = "SELECT * FROM tb_admin WHERE id = $sessionId";

?>
<!---------------------------------------------------------------------------------------->
<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'media')" id="defaultOpen">Midia Url</button>
    <button class="tablinks" onclick="openTab(event, 'about_us')">À propos De Nous</button>
    <button class="tablinks" onclick="openTab(event, 'web_img')">Paramètres D'affichage</button>
</div>

<!-- Tab content -->
    <?php
    include("inc/db.php");
        $get_data="select * from about_web";
        $result = mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);

       /* $get_data->execute();
        $row=$get_data->fetch();*/
    ?>
      <div id="media" class="tabcontent">
          <?php
             echo save_media();
          ?>
      </div>

      <div id="about_us" class="tabcontent">
         <?php
            echo save_about_us();
         ?>
      </div>
      
      <div id="web_img" class="tabcontent">
          <?php
             echo save_afficharge();
          ?>
        
      </div>
     
<!---------------------------------------------------------------------------------------->
</div>


