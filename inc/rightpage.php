<?php
  include("inc/db.php");
?>
  <!--RIGHT PAGE-->
  <div class="right">
                 <!--END TOP-->
<?php if(!isset($_GET['cat'])&&!isset($_GET['sub_cat']) &&!isset($_GET['about_web'])&&!isset($_GET['message'])&&!isset($_GET['admin_compte'])&&!isset($_GET['add_blog'])&&!isset($_GET['afficher_blog'])&&!isset($_GET['user'])&&!isset($_GET['demande'])&&!isset($_GET['cour'])){ ?>
                <?php
                    $get_demande="select * from demande_enseignement";
                   /* $get_demande->setFetchMode(PDO:: FETCH_ASSOC);
                    $get_demande->execute();*/

                    //$get_demande="select * from tb_admin where id='$id'";
                    $result = mysqli_query($con,  $get_demande);
                    
                  
                    while($row = mysqli_fetch_assoc($result)){
                         $id_user=$row['id_user'];
                         $get_user="select * from user where id_user ='$id_user'";
                         $result_user = mysqli_query($con,  $get_user);
                         $sub_row=mysqli_fetch_assoc($result_user);


                         if($row['resultat'] == 0){
                 ?> 
                    <div class="recent-update">
                      <div class="updates">
                         <div class="update">
                             <div class="profile-photo">
                                  <img src="images/<?php echo $sub_row['user_image']?>" alt="">
                             </div>
                             <div class="message">
                              <b><?php echo $sub_row['nome'];echo '    '; echo $sub_row['prenom'];?></b><p> <?php echo $row['niveau_acad']?></p>  
                              </div>
                         </div>
                      </div>
                    </div>
                    <?php } }  ?>
                     
                 <a href="index.php?demande">Show All</a>
<?php }  ?>
           </div>
