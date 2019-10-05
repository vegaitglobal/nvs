<?php

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
