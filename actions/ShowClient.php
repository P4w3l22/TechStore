<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<title>Pokaż klienta</title>
</head>
<?php include('parts/contentBackground.php'); ?>
<form action="ShowClient.php" method="post" class="row-md-10" style="margin: 20px;">
    <label for="choice" class="form-label">Wybierz klienta</label>
    <select 
        class="form-select" 
        id="choice" 
        name="choice" 
        style="width: 20%;"
        requierd>
        <?php $manage -> Show(); ?>
    </select>
    <input class="submit_button" type="submit" style="margin-top: 30px;" value="Szukaj">
</form>

<div class="row-md-10 m-5">

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $manage -> ShowSingleRow(); 
        }
    ?>
</div>

<?php include('parts/footer.php'); ?>