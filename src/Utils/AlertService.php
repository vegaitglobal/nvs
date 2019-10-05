<?php

require_once __DIR__.'/Alert.php';

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