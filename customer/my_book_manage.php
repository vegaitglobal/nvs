<?php

class AlertService
{
    private $alerts = [];

    public function addAlert($type, $message)
    {
        $this->alerts[] = new Alert($type, $message);
    }

    public function getFirstAlert()
    {
        return $this->alerts[0];
    }

    public function hasAlerts()
    {
        return count($this->alerts) > 0;
    }
}

class Alert
{
    protected $type;

    protected $message;

    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function __toString()
    {
        return sprintf('<div class="alert alert-%s">%s</div>', $this->type, $this->message);
    }
}

$AlertsService = new AlertService();

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from volunteers where customer_email='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

if (!mysqli_num_rows($run_customer)) {
    $AlertsService->addAlert('danger', 'Ulogujte se');
}

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$wishlist_id = $_GET['wishlist_id'];

if (!$wishlist_id) {
    $AlertsService->addAlert('danger', 'Prijava nije izabrana');
}

$get_wishlist = "select * from wishlist where wishlist_id='$wishlist_id' limit 1";

$run_wishlist = mysqli_query($con, $get_wishlist);

if (!mysqli_num_rows($run_wishlist)) {
    $AlertsService->addAlert('danger', 'Prijava ne postoji');
}

$row_wishlist = mysqli_fetch_array($run_wishlist);

if (isset($_POST['hours'])) {

    $hours = $_POST['hours'];

    if (!$hours || !is_numeric($hours)) {
        $AlertsService->addAlert('danger', 'Greška u vrednosti sati');
    }

    if (!$AlertsService->hasAlerts()) {
        $save_hours = "update wishlist set hours='$hours' where wishlist_id='$wishlist_id'";

        $run_save_hours = mysqli_query($con, $save_hours);

        if ($run_save_hours) {
            $AlertsService->addAlert('success', 'Sati uspešno snimljeni');

            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            $AlertsService->addAlert('danger', 'Greška u snimanju sati');
        }
    }
}

?>

<center><!-- center Starts -->

    <h1> Unos sati </h1>

</center><!-- center Ends -->

<hr>

<?php if ($AlertsService->hasAlerts()): ?>
    <?php echo $AlertsService->getFirstAlert() ?>
<?php endif ?>

<form method="post" action="">

    <div class="form-group">
        <label class="control-label">
            Unesi broj sati:
            <input type="text" class="form-control" required name="hours" value="<?php echo $hours ?>"/>
        </label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-check"></i>
            Snimi
        </button>
    </div>

</form>
