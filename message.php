<?php 

  if (isset($_SESSION['message'])):

?>     


<div class="aler">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <?= $_SESSION['message']; ?>
</div>

<?php 
  unset($_SESSION['message']);
  endif;
?>

