<main>
<!--*******************************************************************-->
<?php if(isset($_GET['edit_sub_cat'])){ 
          
            echo edit_sub_cat();

            }else{?>
      <div id="table-cat">
              <details>
                   <summary><h3>Add Sub Category</h3></summary>
                   <form method="post" enctype="multipart/form-data"  name='myForm5' onsubmit='return validateForm5()'>
                          <span style='margin-left:0%;' class='error' id='errorpresub_cat'></span>
                          <input type="text"  name="sub_cat_name" placeholder="Enter Sub Category Name"/>
                          <center><button name='add_sub_cat'> Add Sub Category</button> </center>
                        </form>
                </details>
                   <h2>All Sub Categories</h2> 
                   <table>
                       <thead>
                           <tr>
                               <th>Categories Number</th>
                               <th>Sub Categories</th>
                               <th>Edit</th>
                               <th>Delet</th>
                           </tr>
                       </thead>
                       
                           <?php echo view_sub_cat();?>
                       
                      </table>
     </div>
                   <?php } ?>
</main>
<?php
  echo add_sub_cat();
?>


