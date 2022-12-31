<div class="container food d-flex align-items-center">
    <div class="container d-flex flex-column">
        <div class="titleFood">
            <p>
                <?php echo 'Meal: ' . $value['name']; ?>
            </p>
        </div>
        <div class="kcal">
            <p>
                <?php echo 'Kcal: ' . $value['calorie']; ?>
            </p>
        </div>
        <div class="time">
            <p>
                <?php echo 'Time: ' . $value['hm']; ?>
            </p>
        </div>
    </div>
    <button><i class="bi bi-trash"></i></button>
</div>