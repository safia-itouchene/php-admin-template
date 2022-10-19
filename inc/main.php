<?php
     $get_demande="select * from demande_enseignement where resultat='2'";
     $result = mysqli_query($con,  $get_demande);
     $demande=mysqli_num_rows($result);

     $get_user="select * from user";
     $result_user = mysqli_query($con,  $get_user);
     $users=mysqli_num_rows($result_user);  
     if($users !=0) {
          $x= ($demande*100)/$users;
     }else{
          $x= 0;
     }
    
     $y=100-$x;

     $get_cour="select * from course";
     $result_cour= mysqli_query($con,  $get_cour);
     $cour=mysqli_num_rows($result_cour);
?>

<?php if(!isset($_GET['cat'])&& !isset($_GET['sub_cat'])&&!isset($_GET['about_web'])&&!isset($_GET['message'])&&!isset($_GET['admin_compte'])&&!isset($_GET['add_blog'])&&!isset($_GET['afficher_blog'])&&!isset($_GET['user'])&&!isset($_GET['demande'])&&!isset($_GET['cour'])){ ?>
<main>
            <h1>Dashbord</h1>
            <div class="insights">
                <div class="sales">
                <i class="fa-solid fa-chart-line"></i> 
                    <div class="middle">
                         <div class="left">
                             <h3>Nombre d'enseignants</h3>
                             <h1><?php echo $demande;?></h1>
                         </div>
                         <div class="progress">
                                  <h1><?php echo $x;?>%</h1>
                             </div>
                         
                    </div>
                      
               </div>
               <!--END TOP SELLES-->
               <div class="icome">
               <i class="fa-solid fa-chart-simple"></i>  
                    <div class="middle">
                         <div class="left">
                             <h3>Total Cours</h3>
                             <h1><?php echo $cour;?></h1>
                         </div>
                             <div class="progress">
                                   <h1>100%</h1>
                             </div>
                         
                    </div>
                      
               </div>
               <!--END TOP SELLES-->

               <div class="expenses">
               <i class="fa-solid fa-chart-pie"></i>  
                    <div class="middle">
                         <div class="left">
                             <h3>Total users</h3>
                             <h1><?php echo $users;?></h1>
                        </div>
                             <div class="progress">
                                   <h1><?php echo $y;?>%</h1>
                             </div>
                         
                    </div>
                      
               </div>
               <!--END TOP SELLES-->
             </div>

             <!--MAIN 2-->
                <div class="recent-orders">
                   <h2>ADMINS</h2> 
                   <table>
                       <thead>
                           <tr>
                              <th>NUM</th>
                               <th>NOM</th>
                               <th>E MAIL</th>
                           </tr>
                       </thead>
                        <tbody>
                             <?php
                                  include("inc/db.php");
                                  $get_admin="select * from tb_admin";
                                  $i=1;
                                  $result = mysqli_query($con,$get_admin);
                                  while($row=mysqli_fetch_assoc($result)){
                             ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['name']; echo "&nbsp;&nbsp;";  echo $row['lastname'];?></td>
                                <td><?php echo $row['email'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                   </table>
                </div>
</main>
<?php }  ?>
