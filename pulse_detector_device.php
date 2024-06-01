<?php

class PulseDetectorDevice {
    private $device_id;
    private $pulse_rate;

    public function __construct($device_id, $pulse_rate) {
        $this->device_id = $device_id;
        $this->pulse_rate = $pulse_rate;
    }

    public function getdeviceId() {
        return $this->device_id;
    }

    public function getPulseRate() {
        return $this->pulse_rate;
    }

    public function setDeviceId($device_id) {
        $this->device_id = $device_id;
    }

    public function setPulseRate($pulse_rate) {
        $this->pulse_rate = $pulse_rate;
    }
}

?>