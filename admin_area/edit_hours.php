<?php
if(isset($_GET['path']) && isset($_GET['id'])) {
    if(!empty($_GET['id'])) {
        $sql = "SELECT * FROM wishlist WHERE wishlist_id =".$_GET['id']; 
        $run = mysqli_query($con, $sql); 
        $wishlist = mysqli_fetch_array($run);
    }
}


?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>IZMENA SATI:</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <form action="save_order.php" method="POST">
                    <input type="hidden" name="path" value="edit_hours">
                    <input type="hidden" name="id" value="<?= $wishlist['wishlist_id']?>">
                    <div class="form-group">
                        <label for="hours">Sati:</label>
                        <input name="hours" type="text" id="hours" class="form-control" value="<?= $wishlist['hours'] ?>" plachold="Unesite sate">
                    </div>
                    <div class="form-group">
                        <label>Odaberite validaciju sati:</label>
                        <div class="form-group">
                        <input name="hours_approved" type="radio" value="1" <?php if ($wishlist['hours_approved'] === '1') echo 'checked' ?>>Da</br>
                        <input name="hours_approved" type="radio" value="0" <?php if ($wishlist['hours_approved'] === '0') echo 'checked' ?>>Ne
                        </div>
                    </div>
                    <div class="form-group">
                        <button name='snimi' type="submit" class="btn btn-success">Sačuvaj</button>
                        <a href="index.php?path=view_orders_hours">Nazad</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div
