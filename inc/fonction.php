<?php
function add_cat(){
    include("inc/db.php");
if(isset($_POST['add_cat'])){
     $cat_name= $_POST['cat_name'];
     
     $file=$_FILES['cover'];
     $fileName = $_FILES['cover']['name'];
     $fileTmpName = $_FILES['cover']['tmp_name'];
     $fileExt =explode('.', $fileName);
     $fileActualExt =strtolower(end($fileExt));
     $allowed =array('jpg', 'jpeg', 'png');
     $fileNameNew = uniqid('',true).".".$fileActualExt;
     $fileDestination = 'images/'.$fileNameNew;
     move_uploaded_file($fileTmpName , $fileDestination);

     $check="select * from cat where cat_name='$cat_name'";
     $result = mysqli_query($con, $check);
     $count=mysqli_num_rows($result);
    
     if($count==1){
      echo"<script>alert('La langue existe déjà')</script>";
} else{
       $add_cat="insert into cat(cat_name,image)values('$cat_name','$fileNameNew')";

   if(mysqli_multi_query($con,$add_cat)){
       echo"<script>alert('Langue ajoutée avec succès')</script>";
       echo'<script> location.href ="index.php?cat";</script>';
   }else{
       echo"<script>alert('Erreur ... ')</script>";
   }
}
}
}

function view_cat(){
    include("inc/db.php");
    $get_cat="select * from cat";
    $result = mysqli_query($con,  $get_cat);
    while($row=mysqli_fetch_assoc($result)):
           echo "<tr>
                      <td><img style='width:80px;height:50px; margin-left:40%;' src='images/".$row['image']."'></td>
                      <td>".$row['cat_name']."</td>
                      <td><a id='edit-icon' href='index.php?cat&edit_cat=".$row['cat_id']."'><span class='material-icons-sharp'>border_color</span></a></td>
                      <td><a id='del-icon'  href='index.php?cat&del_cat=".$row['cat_id']."'><span class='material-icons-sharp'>delete</span></a></td>
                </tr>";
    endwhile;
   /*pour supprimer un cat*/
    if(isset($_GET['del_cat'])){
        $id=$_GET['del_cat'];
        $del="delete from cat where cat_id='$id'";
        if(mysqli_multi_query($con,$del)){
            echo"<script>alert('La suppression a été effectuée')</script>";
            echo'<script> location.href ="index.php?cat";</script>';
        }else{
           echo"<script>alert('Erreur ...')</script>";
        }
    }

}
/*************************EDIT******************/
function edit_cat(){
    include("inc/db.php");
    
if(isset($_GET['edit_cat'])){
$id=$_GET['edit_cat'];
$get_cat="select * from cat where cat_id='$id'";
$result = mysqli_query($con, $get_cat);
$row = mysqli_fetch_assoc($result);


 echo" <h2 id='title'>Edit Category</h2>
<form id='edit_form' method='post' enctype='multipart/form-data'    name='myForm4' onsubmit='return validateForm4()'>
      <span style='margin-left:0%;' class='error' id='errorprecategory'></span>
      <input type='text'  name='cat_name' value='".$row['cat_name']."' placeholder='Enter Category Name'/>
      <center><button name='edit_cat'> Edit Category</button> </center>
 </form>";

 if(isset($_POST['edit_cat'])){
      $cat_name=$_POST['cat_name'];
      $check="select * from cat where cat_name='$cat_name'";
      $result_check = mysqli_query($con, $check);
      $count=mysqli_num_rows($result_check);

      if($count==1){
       echo"<script>alert('La langue existe déjà')</script>";
 } else{
      $up="update cat set cat_name='$cat_name' where cat_id='$id'";
      if(mysqli_multi_query($con,$up)){
          echo"<script>alert('Langue modifier avec succès')</script>";
          echo'<script> location.href ="index.php?cat";</script>';
      }else{
          echo"<script>alert('Erreur ...')</script>";
      }
    }
 }
}
}

/*fonctio pour select les  cat*/
function select_cat(){
    include("inc/db.php");
    $get_cat="select * from cat";
    $result = mysqli_query($con, $get_cat);
    while($row = mysqli_fetch_assoc($result)):
           echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
    endwhile;
}


    /*fonction pour ajouter sub cat */
function add_sub_cat(){
        include("inc/db.php");
if(isset($_POST['add_sub_cat'])){
         $sub_cat_name= $_POST['sub_cat_name'];
         $check="select * from sub_cat where sub_cat_name='$sub_cat_name'";
         $result_check = mysqli_query($con, $check);
         $count=mysqli_num_rows($result_check);
  
         if($count==1){
             echo"<script>alert('Niveau  existe déjà')</script>";
            
    } else{
           $add_sub_cat="insert into sub_cat(sub_cat_name)values('$sub_cat_name')";
       if(mysqli_multi_query($con, $add_sub_cat)){
            echo"<script>alert('Niveau ajouté avec succès')</script>";
            echo'<script> location.href ="index.php?sub_cat";</script>';
       }else{
           echo"<script>alert('Erreur ...')</script>";
          
       }
    }
}
}

function view_sub_cat(){
    include("inc/db.php");
    $get_sub_cat="select * from sub_cat";
    $result = mysqli_query($con, $get_sub_cat);
    $i=1;
    while($row = mysqli_fetch_assoc($result)):
           echo "<tr>
                      <td>".$i++."</td>
                      <td>".$row['sub_cat_name']."</td>
                      <td><a id='edit-icon' href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."'><span class='material-icons-sharp'>border_color</span></a></td>
                      <td><a id='del-icon' href='index.php?sub_cat&del_sub_cat=".$row['sub_cat_id']."'><span class='material-icons-sharp'>delete</span></a></td>
                </tr>";
    endwhile;
       /*pour supprimer un cat*/
       if(isset($_GET['del_sub_cat'])){
        $id=$_GET['del_sub_cat'];
        $del="delete from sub_cat where sub_cat_id='$id'";
        if(mysqli_multi_query($con, $del)){
            echo"<script>alert('La suppression a été effectuée')</script>";
            echo'<script> location.href ="index.php?sub_cat";</script>';
        }else{
            echo"<script>alert('Erreur ...')</script>";
        }
    }
}


function edit_sub_cat(){
    include("inc/db.php");
    
if(isset($_GET['edit_sub_cat'])){
$id=$_GET['edit_sub_cat'];

$get_sub_cat="select * from sub_cat where sub_cat_id='$id'";
$result = mysqli_query($con, $get_sub_cat);
$row=mysqli_fetch_assoc($result);

 echo" <h2 id='title'>Edit Sub Category</h2>
<form id='edit_form' method='post' enctype='multipart/form-data'   name='myForm5' onsubmit='return validateForm5()'>
     <span style='margin-left:0%;' class='error' id='errorpresub_cat'></span>
     <input type='text'  name='sub_cat_name' value='".$row['sub_cat_name']."' placeholder='Enter Category Name'/>
     <center><button name='sub_edit_cat'> Edit Category</button> </center>
</form>"; 

 if(isset($_POST['sub_edit_cat'])){
      $cat_name=$_POST['sub_cat_name'];
      $up="update sub_cat set sub_cat_name='$cat_name' where sub_cat_id='$id'";
      if(mysqli_multi_query($con, $up)){
          echo"<script>alert('Niveau modifier avec succès')</script>";
          echo'<script> location.href ="index.php?sub_cat";</script>';
      }else{
          echo"<script>alert('Erreur Niveau non modifier')</script>";
      }
}
}
}




function admin_compte(){
    include("inc/db.php");
    $id=$_SESSION['id_user'];
    $get_con="select * from tb_admin where id='$id'";
    $result = mysqli_query($con,  $get_con);
    $row=mysqli_fetch_assoc($result);

    echo" 
    <form method='post' id='propile_info'   name='myForm' onsubmit='return validateForm()'>
    <table>
      <tr>
        <td><h2>E mail</h2></td>
        <td> <span style='margin-left:19%;' class='error' id='erroremail'></span><br><input type='email' value='".$row['email']."' name='email'>
        </td>
      </tr>
      
      <tr>
        <td><h2>Le Nom</h2></td>
        <td><span style='margin-left:19%;' class='error' id='errornom'></span><br> <input type='text' value='".$row['name']."' name='nom'></td>
      </tr>
      <tr>
        <td><h2>Le Prenom</h2></td>
        <td> <span style='margin-left:19%;' class='error' id='errorprenom'></span><br><input type='text' value='".$row['lastname']."' name='prenom'></td>
      </tr>
    </table>
    <button  type='submit'  name='save'>SAVE</button>
 </form>";
 
  if(isset($_POST['save'])){
    $email=$_POST['email'];
    $nom=$_POST['nom'];
  
    $prenom=$_POST['prenom']; 
    $check="select email from tb_admin where id !='$id' and email ='$email'";
    $result_check = mysqli_query($con, $check);
    $count=mysqli_num_rows($result_check);
    if($count==0){
        $up="update tb_admin set email='$email',name='$nom',lastname='$prenom' where id ='$id'";
    }else{
        echo"<script>alert('Email existe')</script>";
        echo'<script> location.href ="index.php?admin_compte";</script>';
    }
     
    if(mysqli_multi_query($con, $up)){
        echo"<script>alert('Modifié...')</script>";
        echo'<script> location.href ="index.php?admin_compte";</script>';
    }
}
}
   function reset_password(){
    include("inc/db.php");
    $get_con="select * from tb_admin";
    $result = mysqli_query($con,  $get_con);
    $row=mysqli_fetch_assoc($result);
    echo" 
    <form method='post' id='propile_info' style='margin-top:10%'  name='myForm2' onsubmit='return validateForm2()'>
    <table>
      <tr>
        <td><h2>Mot de passe actuel</h2></td>
        <td><span style='margin-left:19%;' class='error' id='errorpreactuelPassword'></span><br> <input type='password' name='actuel_password'></td>
      </tr>
      <tr>
        <td><h2>Nouveau mot de passe</h2></td>
        <td><span style='margin-left:19%;' class='error' id='errorprenvuPassword'></span><br> <input type='password'  name='nvu_password'></td>
      </tr>
      <tr>
        <td><h2>Répété mot de passe</h2></td>
        <td><span style='margin-left:19%;' class='error' id='errorprecnvPassword'></span><br> <input type='password'  name='cnv_password'></td>
      </tr>
    </table>
   
       <button type='submit' name='reset_password'>SAVE</button>
    
 </form>";
 
  if(isset($_POST['reset_password'])){
    $actuel_password=$_POST['actuel_password'];
    $nvu_password=$_POST['nvu_password'];
    $cnv_password=$_POST['cnv_password'];
    
    $id=$_SESSION['id_user'];
    $get_password="select password from tb_admin where id='$id'";
    $result = mysqli_query($con,$get_password);
    $row=mysqli_fetch_assoc($result);
    $password=$row['password'];
    if($password == $actuel_password){
        if($nvu_password == $cnv_password){
            $up="update tb_admin set password='$cnv_password' where id ='$id'";
            if(mysqli_multi_query($con, $up)){
                echo"<script>alert('Modifié')</script>";
                echo'<script> location.href ="index.php?admin_compte";</script>';
            }else{
                echo"<script>alert('Non Modifié ...')</script>";
            }
        }else{
                echo"<script>alert('Non Modifié ...')</script>";
        }
    }else{
               echo"<script>alert('Non Modifié ...')</script>";
    }
   
   }
}
   
/********************************Add Blog***********************/
 function save_media(){
    include("inc/db.php");
    $get_data="select * from about_web";
    $result = mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result);

    echo'
<form method="post" id="propile_info" name="blogFormabout" onsubmit="return validateblogFormabout()">

    <br><label for="recipient-name"><i class="fa-brands fa-github"></i>&nbsp;&nbsp;&nbsp;Github&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:0%;" class="error" id="errorurl1"></span></label> <br>
    <input type="url" name="url1"  id="recipient-name" value="'.$row["url1"].'">
    

    <br><label for="recipient-name" ><i class="fa-brands fa-youtube"></i>&nbsp;&nbsp;&nbsp;Youtube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:0%;" class="error" id="errorurl2"></span></label> <br>
    <input type="url" name="url2"  id="recipient-name" value="'.$row["url2"].'">

    <br><label for="recipient-name" ><i class="fa-brands fa-facebook"></i>&nbsp;&nbsp;&nbsp;Facebook&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:0%;" class="error" id="errorurl3"></span></label> <br>
    <input type="url" name="url3"  id="recipient-name" value="'.$row["url3"].'">
    

    <br><label for="recipient-name" ><i class="fa-brands fa-twitter"></i>&nbsp;&nbsp;&nbsp;Twitter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:0%;" class="error" id="errorurl4"></span></label> <br>
    <input type="url" name="url4"  id="recipient-name" value="'.$row["url4"].'">
     

    <br><label for="recipient-name" ><i class="fa-brands fa-instagram"></i>&nbsp;&nbsp;&nbsp;Instagram&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:0%;" class="error" id="errorurl5"></span></label> <br>
    <input type="url" name="url5" id="recipient-name" value="'.$row["url5"].'">
   
    <div   style=" margin-left:5%;">
    <button   type="submit"  name="save_media">SAVE</button></div>
</form>';
     if(isset($_POST['save_media'])){
        $url1=$_POST['url1'];
        $url2=$_POST['url2'];
        $url3=$_POST['url3'];
        $url4=$_POST['url4'];
        $url5=$_POST['url5'];

        $update="update about_web set url1='$url1',url2='$url2',url3='$url3',url4='$url4',url5='$url5'";
        if(mysqli_multi_query($con, $update)){
            echo"<script>alert('Modifié ...')</script>";
            echo'<script> location.href ="index.php?about_web";</script>';
        }
    } 
 }

    function save_about_us(){
        include("inc/db.php");
        $get_data="select * from about_web";
        $result = mysqli_query($con, $get_data);
        $row=mysqli_fetch_assoc($result);

        echo '
        <form method="post">
           <br><h1>&nbsp;&nbsp;&nbsp;À propos De Nous</h1> <br>
           <textarea name="about_us" id="" cols="30" rows="10" placeholder="Pourquoi Nous ?">'.$row['about_us'].'</textarea>
           <button  type="submit"  name="save_about_us">SAVE</button>
        </form>
        ';
        if(isset($_POST['save_about_us'])){
            $about_us=$_POST['about_us'];
            echo"<script>alert('$about_us')</script>";
            $update="update about_web set about_us ='$about_us'";

            if(mysqli_multi_query($con, $update)){
                echo"<script>alert(' Modifié ...')</script>";
                echo'<script> location.href ="index.php?about_web";</script>';
            }
        }
    }

    function save_afficharge(){
        include("inc/db.php");
        $get_data="select * from about_web";
        $result = mysqli_query($con, $get_data);
        $row=mysqli_fetch_assoc($result);


        echo '<form method="post" enctype="multipart/form-data"> 
      <div>
        <h3>Modifier le logo du site.</h3>
        <img id="file-ip-1-preview" width = 100 height = 100   src="images/'.$row["logo"].'" alt="">
        <label for="file-ip-1">uplod image</label><br>
        <input type="file" name="logo" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
      </div>
      <div class="pic">
           <img style=" margin-bottom:10%;" id="file-ip-2-preview" width = 100 height = 100  src="images/'.$row["cover"].'" alt="">
           <label for="file-ip-2">uplod image</label><br>
           <input  type="file" name="cover" id="file-ip-2" accept="image/*" onchange="showPreview2(event);" >
        </div>
        <button  type="submit"  name="save_aff" onclick="myFunction_set()">SAVE</button>
        </form>';
       

        if(isset($_POST['save_aff'])){
            $logo=$_FILES['logo'];
            $logoName = $_FILES['logo']['name'];
            $logoTmpName = $_FILES['logo']['tmp_name'];
            $logoExt =explode('.', $logoName);
            $logoActualExt =strtolower(end($logoExt));
            $allowed =array('jpg', 'jpeg', 'png');
            $logoNameNew = uniqid('',true).".".$logoActualExt;
            $logoDestination = 'images/'.$logoNameNew;
            move_uploaded_file($logoTmpName , $logoDestination);

            $file=$_FILES['cover'];
            $fileName = $_FILES['cover']['name'];
            $fileTmpName = $_FILES['cover']['tmp_name'];
            $fileExt =explode('.', $fileName);
            $fileActualExt =strtolower(end($fileExt));
            $allowed =array('jpg', 'jpeg', 'png');
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = 'images/'.$fileNameNew;
            move_uploaded_file($fileTmpName , $fileDestination);
            
            $update="update about_web set cover='$fileNameNew', logo='$logoNameNew'";
            if(mysqli_multi_query($con, $update)){
                echo"<script>alert('Modifié ...')</script>";
                echo'<script> location.href ="index.php?about_web";</script>';
            }
        }
    }
    function add_blog(){

        include("inc/db.php");
        $id=$_SESSION['id_user'];
        if(isset($_POST['add_blog'])){
             $blog_title=$_POST["blog_title"];
             $blog_sub_title=$_POST["blog_sub_title"];
             $blog_cont=$_POST['blog_cont'];
             $blog_date=date("Y.m.d");


             $file=$_FILES['cover'];
             $fileName = $_FILES['cover']['name'];
             $fileTmpName = $_FILES['cover']['tmp_name'];
             $fileExt =explode('.', $fileName);
             $fileActualExt =strtolower(end($fileExt));
             $allowed =array('jpg', 'jpeg', 'png');
             $fileNameNew = uniqid('',true).".".$fileActualExt;
             $fileDestination = 'images/'.$fileNameNew;
             move_uploaded_file($fileTmpName , $fileDestination);
        
           
             $add_blog="insert into tb_blog(id_admin,blog_title,blog_sub_title,blog_cont,blog_image,blog_date)values('$id','$blog_title','$blog_sub_title','$blog_cont','$fileNameNew','$blog_date')";
           
             if(mysqli_multi_query($con, $add_blog)){
                echo"<script>alert('blog ajouté avec succès')</script>";
                echo'<script> location.href ="index.php?afficher_blog";</script>';
            }else{
                echo"<script>alert('Erreur ...')</script>";
            }
            
        }

    }
/********************************Afficher Blog***********************/

          function afficher_blog(){
            include("inc/db.php");
            $id=$_SESSION['id_user'];
            $get_blog="select * from tb_blog where id_admin='$id'";
            $result = mysqli_query($con,  $get_blog);
           
            $i=1;
            while( $row=mysqli_fetch_assoc($result)):
                   echo "<tr><td id='image_blog'><img  src='images/";
                   echo $row['blog_image'];
                   echo"'></img></td>
                              <td>".$row['blog_title']."</td>
                              <td><a id='view-icon'  href='#'><span class='material-icons-sharp'>visibility</span></a></td>
                              <td><a id='edit-icon' href='index.php?afficher_blog&edit_blog=".$row['id_blog']."'><span class='material-icons-sharp'>border_color</span></a></td>
                              <td><a id='del-icon'  href='index.php?afficher_blog&del_blog=".$row['id_blog']."'><span class='material-icons-sharp'>delete</span></a></td>
                        </tr>";
            endwhile;
           /*pour supprimer un cat*/
            if(isset($_GET['del_blog'])){
                $id=$_GET['del_blog'];
                $del="delete from tb_blog where id_blog='$id'";
                if(mysqli_multi_query($con, $del)){
                    echo"<script>alert('La suppression a été effectuée')</script>";  
                    echo'<script> location.href ="index.php?afficher_blog";</script>';
                }else{
                    echo"<script>alert('Erreur ...')</script>";
                   
                }
            }

          }

/************************Edit Blog************************/
      function edit_blog(){
           include("inc/db.php");
        if(isset($_GET['edit_blog'])){
            $id=$_GET['edit_blog'];
            $get_blog="select * from tb_blog where id_blog='$id'";
            $result = mysqli_query($con,  $get_blog);
            $row=mysqli_fetch_assoc($result);
           
             echo "<div class='edit_blog'>
                  <form  method='post' enctype='multipart/form-data'  name='blogForm' onsubmit='return validateblogFormedit()'>
                  <h1>Add New Blog</h1> 
                  <span style='margin-left:0%;' class='error' id='errorblog_title'></span>
                  <input type='text' name='blog_title'  placeholder='Enter Blog Title' value='".$row['blog_title']."'>

                  <span style='margin-left:0%;' class='error' id='errorsub_title'></span>
                  <input type='text' name='blog_sub_title'  placeholder='Enter Sub Title'  value='".$row['blog_sub_title']."'>
                 
                  <img id='file-ip-3-preview' width = 140 height = 140   src='images/".$row['blog_image']."' alt=''>
              
                  <label for='file-ip-3'>Upload Image</label>
                  <input type='file' name='blog_image' id='file-ip-3' accept='image/*' onchange='showPreview3(event);'>
                   
                  <span style='margin-left:0%;' class='error' id='errorsub_txt'></span>
                  <textarea name='blog_cont' id='' cols='30' rows='10' placeholder='Create New Blog'>".$row['blog_cont']."</textarea>
                  <button   name='modifer_blog'>Modifier</button>
                  </form>
         </div>";
        }
        if(isset($_POST['modifer_blog'])){
            $blog_title=$_POST['blog_title'];
            $blog_sub_title=$_POST['blog_sub_title'];
            $blog_cont=$_POST['blog_cont'];
            $blog_image=$_FILES['blog_image']['name'];
              if(empty($blog_image)){
                $up="update tb_blog set blog_title='$blog_title',blog_sub_title='$blog_sub_title' ,blog_cont='$blog_cont' where id_blog ='$id'";
            }else{
                $up="update tb_blog set blog_title='$blog_title',blog_sub_title='$blog_sub_title' ,blog_cont='$blog_cont',blog_image='$blog_image' where id_blog ='$id'";
            }
              if(mysqli_multi_query($con, $up)){
                echo "<script>alert('Modifié ...')</script>";  
                echo'<script> location.href ="index.php?afficher_blog";</script>';
            }else{
                echo"<script>alert('Erreur ...')</script>"; 
            }
        }
}
/***********************************Afficher User************************ */

function view_user(){
    include("inc/db.php");
    $get_user="select * from user";
    $result = mysqli_query($con,$get_user);
 
    $i=1;
    while($row=mysqli_fetch_assoc($result)):
        echo "<tr><td id='image_user'><img  src='images/";
        echo $row['user_image'];
        echo"'></img></td>
                   <td>".$row['nome']."</td>
                   <td>".$row['prenom']."</td>
                   <td>".$row['email']."</td>
                   <td><a id='del-icon'  href='index.php?user&del_user=".$row['id_user']."'><span class='material-icons-sharp'>delete</span></a></td>
             </tr>";
 endwhile;
   /*pour supprimer un cat*/
    if(isset($_GET['del_user'])){
        $id=$_GET['del_user'];
        $del="delete from user where id_user='$id'";
        if(mysqli_multi_query($con, $del)){
            echo"<script>alert('La suppression a été effectuée')</script>";
            echo'<script> location.href ="index.php?user";</script>';
            
        }else{
           echo"<script>alert('Erreur ...')</script>";
          // echo"<script>window.open('index.php?cat','self')</script>"; 
        }
    }

}


function demande(){
    include("inc/db.php");
    $get_demande="select * from demande_enseignement";
    $result = mysqli_query($con,$get_demande);
    
    
    while($row=mysqli_fetch_assoc($result)){
        $id_user=$row['id_user'];

        $get_user="select * from user where id_user ='$id_user'";
        $result_user = mysqli_query($con,$get_user);
        $sub_row=mysqli_fetch_assoc($result_user);

        
        if($row['niveau']==1){
            $niveau="C1";
        } else{
            if($row['niveau']==2){
                $niveau="C2";
            }
        }

   if($row['resultat'] == 0){ // en attande
    echo ' <form method="post"><tr>
            <td>'.$sub_row['nome'].'   '.$sub_row['prenom'].'</td>
            <td>'.$row['niveau_acad'].'</td>
            <td>'.$row['lang'].'</td>
            <td>Niveau '.$niveau.'</td>
            <td>
               <a href="index.php?demande&refuser='.$row['id'].'" name="refuser" id="button_d">Refuser</a>
               <a href="index.php?demande&accept='.$row['id'].'" name="accept" id="button_s">Acceptez</a>
            </td>
         </tr></form>

   ';}
} 
      if(isset($_GET['refuser'])){
          $id=$_GET['refuser'];
          $up="update demande_enseignement set resultat='1' where id='$id'";
          mysqli_multi_query($con, $up);
          echo'<script> location.href ="index.php?demande";</script>';
      }
      if(isset($_GET['accept'])){
        $id=$_GET['accept'];
        $up="update demande_enseignement set resultat='2' where id='$id'";
        mysqli_multi_query($con, $up);
         echo'<script> location.href ="index.php?demande";</script>';
    }
}
   function view_cour(){
    include("inc/db.php");
    $get_cours="select * from course";
    $result = mysqli_query($con,$get_cours);
 
    $i=1;
    while($row=mysqli_fetch_assoc($result)):
        $id_cat=$row['id_cat'];
        $get_cat="select * from cat where cat_id ='$id_cat'";
        $result_cat = mysqli_query($con,$get_cat);
        $row_cat=mysqli_fetch_assoc($result_cat);

        $id_ens=$row['id_user'];
        $get_ens="select nome,prenom from user where id_user  ='$id_ens'";
        $result_ens = mysqli_query($con,$get_ens);
        $row_ens=mysqli_fetch_assoc($result_ens);

        echo "<tr><td><img  style='width:110px;height:60px;'  src='images/";
        echo $row['cover']; echo  "'></img> </td>";
        echo"
                   <td>".$row_ens['nome']."   ".$row_ens['prenom']."</td>
                   <td>".$row_cat['cat_name']."</td>
                   <td>".$row['title']."</td>
                   <td><a id='del-icon'  href='index.php?cour&del_cour=".$row['id_cours']."'><span class='material-icons-sharp'>delete</span></a></td>
             </tr>";
 endwhile;
   /*pour supprimer un cat*/
    if(isset($_GET['del_cour'])){
        $id=$_GET['del_cour'];
        $del="delete from course where id_cours='$id'";
        if(mysqli_multi_query($con, $del)){
            echo"<script>alert('La suppression a été effectuée')</script>";
            echo'<script> location.href ="index.php?cour";</script>';
        }else{
           echo"<script>alert('Erreur ...')</script>";
          // echo"<script>window.open('index.php?cat','self')</script>"; 
        }
    }
   }

?>