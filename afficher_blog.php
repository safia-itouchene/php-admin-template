<main>
<?php if(isset($_GET['edit_blog'])){ 
          
          echo edit_blog();
    }else{?>
<div  id="table-cat">
       <h2>All Bloggs</h2> 
                   <table>
                       <thead>
                           <tr>
                               <th>Blog Image</th>
                               <th>Blog Title</th>
                               <th>View</th>
                               <th>Edit</th>
                               <th>Delet</th>
                           </tr>
                        </thead>
                           <?php echo afficher_blog()?>
                     </table>
</div>
<?php } ?>
</main>