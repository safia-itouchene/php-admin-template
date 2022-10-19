<div class="admin_compte">
<?php
require 'inc/db.php';
// User's session
$sessionId = $_SESSION['id_user'];
$user ="SELECT * FROM tb_admin WHERE id = $sessionId";
?>
<!---------------------------------------------------------------------------------------->
<div class="tab">
<button class="tablinks" onclick="opentab(event, 'info')" id="defaultOpen">Information Personnels</button>
<button class="tablinks" onclick="opentab(event, 'reset_password')">Changer Le Mot De Passe</button>
</div>

<!-- Tab content -->
<div id="info" class="tabcontent">
<form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <div class="upload">
        <?php
        $user ="SELECT * FROM tb_admin WHERE id = $sessionId";
        $result = mysqli_query($con,$user);
        $row=mysqli_fetch_assoc($result);

        /*$user->setFetchMode(PDO:: FETCH_ASSOC);
        $user->execute();
        $row=$user->fetch();*/
        $id =$row['id'];
        $name =$row['name'];
        $image =$row['image'];
        ?>
        <img src="images/<?php echo $image; ?>" width = 100 height = 100 title="<?php echo $image; ?>">
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <span class="material-icons-sharp">photo_camera</span>
        </div>
      </div>
    </form>
    <script type="text/javascript">
          document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
    <?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];
      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query ="update tb_admin set image ='$newImageName' where id = '$id'";
        move_uploaded_file($tmpName, 'images/' . $newImageName);
        if(mysqli_multi_query($con, $query)){
          echo "<script>window.open('index.php?admin_compte','self')</script>";
      }
      }
    }
     echo admin_compte();
    ?>
  
</div>

<div id="reset_password" class="tabcontent">
   <?php echo reset_password();?>
</div>
<!---------------------------------------------------------------------------------------->
</div>
<script>
function opentab(evt, cityName) {
   
    var i, tabcontent, tablinks;
  
   
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
   
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  document.getElementById("defaultOpen").click();
</script>

<script> 
         function validateForm()                                 
         { 
             var email = document.forms["myForm"]["email"];         
             if (email.value == ""){ 
                 document.getElementById('erroremail').innerHTML="Champ obligatoire";  
                 email.focus(); 
                 return false; 
             }else{
                 document.getElementById('erroremail').innerHTML="";  
             }

             var nom = document.forms["myForm"]["nom"];         
             if (nom.value == ""){ 
                 document.getElementById('errornom').innerHTML="Champ obligatoire";  
                 nom.focus(); 
                 return false; 
             }else{
                 document.getElementById('errornom').innerHTML="";  
             }

             var prenom = document.forms["myForm"]["prenom"];         
             if (prenom.value == ""){ 
                 document.getElementById('errorprenom').innerHTML="Champ obligatoire";  
                 prenom.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorprenom').innerHTML="";  
             }
         }


        


             function validateForm2()                                 
         { 
             var actuelPassword = document.forms["myForm2"]["actuel_password"];         
             if (actuelPassword.value == ""){ 
                 document.getElementById('errorpreactuelPassword').innerHTML="Champ obligatoire";  
                 actuelPassword.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorpreactuelPassword').innerHTML="";  
             }

             var nvuPassword = document.forms["myForm2"]["nvu_password"];         
             if (nvuPassword.value == ""){ 
                 document.getElementById('errorprenvuPassword').innerHTML="Champ obligatoire";  
                 nvuPassword.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorprenvuPassword').innerHTML="";  
             }

             var cnvPassword= document.forms["myForm2"]["cnv_password"];         
             if (cnvPassword.value == ""){ 
                 document.getElementById('errorprecnvPassword').innerHTML="Champ obligatoire";  
                 cnvPassword.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorprecnvPassword').innerHTML="";  
             }
         }
      </script> 