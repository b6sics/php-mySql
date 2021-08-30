<?php if (isset($_SESSION['uzenet'])) : ?>
<div class="uzenet">
    <p>
        <?php 
        echo $_SESSION['uzenet'];
        unset($_SESSION['uzenet']);
        ?>
    </p>
</div>
<?php endif ?>
