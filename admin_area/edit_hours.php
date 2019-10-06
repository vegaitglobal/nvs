<?php
   if(isset($_GET['id'])) {
       $_POST['id'] = $_GET['id']; 
   }


  if(isset($_POST['id'])) {
    if(!empty($_['id'])) {
        $id = $_POST['id']; 
        $sql = "SELECT * FROM wishlist WHERE wishlist_id=". $_GET['id']; 
        $run = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($run);
        $_POST['hours'] = $row['hours'];
        $_POST['hours_approved'] = $row['hours_approved'];
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
                <form action="index.php" method="POST">
                    <input type="hidden" name="path" value="edit_hours">
                    <input type="hidden" name="id" value="<?= $_POST['id']?>">
                    <div class="form-group">
                        <label for="hours">Sati:</label>
                        <input type="text" id="hours" class="form-control" value="<?= $_POST['hours']; ?>" plachold="Unesite sate">
                    </div>
                    <div class="form-group">
                        <label>Odaberite validaciju sati:</label>
                        <div class="form-group">
                        <input name="hours_app" type="radio" value="" <?php if($_POST['hours_approved'] == 1) {echo 'checked'; } ?>>Da</br>
                        <input name="hours_app" type="radio" value="" <?php if($_POST['hours_approved'] == 0) {echo 'checked'; } ?>>Ne
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="SNIMI"class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div
<?php var_dump($_GET); ?>