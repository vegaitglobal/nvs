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

$wishlist = $entityManager->find('Wishlist', $wishlist_id);

if (!$wishlist) {
    $AlertsService->addAlert('danger', 'Prijava ne postoji');
}

if (isset($_POST['hours'])) {
    $hours = $_POST['hours'];

    if (!$hours || !is_numeric($hours)) {
        $AlertsService->addAlert('danger', 'Greška u vrednosti sati');
    }

    if (!$AlertsService->hasAlerts()) {
        $wishlist->setHours($hours);

        $entityManager->persist($wishlist);
        $entityManager->flush();

        $AlertsService->addAlert('success', 'Sati uspešno snimljeni');
    }
}

echo $twig->render('my_book_manage.html.twig', [
    'title' => 'Unos sati',
    'hasAlerts' => $AlertsService->hasAlerts(),
    'firstAlert' => $AlertsService->getFirstAlert(),
    'wishlist' => $wishlist,
    'hours' => $hours,
]);
