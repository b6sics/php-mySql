<?php if (isset($_SESSION['uzenet'])) : ?>
<div class=uzenet>
 <p>
  <?php 
   // Ha van üzenet a munkamenet változóban, 
   // akkor írssa ki  majd vegye ki a tömbből
   echo $_SESSION['uzenet']; 
   unset($_SESSION['uzenet']);
  ?>
 </p>
</div>
<?php endif ?>