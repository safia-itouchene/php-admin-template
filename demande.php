<style>

</style>

<main>
<?php if(isset($_GET['edit_blog'])){ 
          
          echo edit_blog();
    }else{?>
<div class='demandes'  id="table-cat">
       <h2>Les Demandes d'enseignement</h2> 
                   <table>
                       <thead>
                           <tr>
                               <th>User Full Name</th>
                               <th>Niveau Académique</th>
                               <th>enseigner?</th>
                               <th>Son niveau</th>
                               <th>Action</th>
                           </tr>
                        </thead>
                           <?php echo demande()?>
                       
                     </table>
</div>



<?php } ?>
</main>


<script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>