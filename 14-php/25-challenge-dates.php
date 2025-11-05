<?php
$title       = '25 - Challenge Dates';
$description = 'Subtract two dates and show the difference in years.';

include 'template/header.php';

echo "<section>";
?>
<form style="background-color: #fff; gap:2rem; padding: 20px; border-radius: 10px; display: flex; flex-direction: column; justify-content: center;" method="POST">
    <label for="date_of_born" style="font-size: 18px; font-weight: bold;">Date of Birth:</label>
    <input type="date" name="date_of_born" id="date_of_born" style="font-size: 18px; padding: 10px 20px; border-radius: 5px;">
    <button style="font-size: 18px; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px;" type="submit" value="Calculate" class="btn btn-outline-success"> Calcular </button>
    <?php
    if ($_POST) {
        $date_of_born = $_POST['date_of_born'];
        $diff  = abs(strtotime($date_of_born) - strtotime(date('Y-m-d')));
        $years = $diff / (60 * 60 * 24 * 365);
    }
    ?>
    <?php if ($_POST): ?>
        <div class="msg" style="font-size: 18px; font-weight: bold;">
            Tienes <?php echo number_format($years, 0); ?> años.
        </div>
    <?php endif ?>
</form>



<?php include 'template/footer.php' ?>