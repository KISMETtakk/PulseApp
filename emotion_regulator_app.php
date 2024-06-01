<?php

class EmotionRegulatorApp {
    private $pulse_app_id;
    private $mood;

    public function __construct($pulse_app_id, $mood) {
        $this->pulse_app_id = $pulse_app_id;
        $this->mood = $mood;
    }

    public function getPulseAppId() {
        return $this->pulse_app_id;
    }

    public function getMood() {
        return $this->mood;
    }

    public function setPulseAppId($pulse_app_id) {
        $this->pulse_app_id = $pulse_app_id;
    }

    public function setMood($mood) {
        $this->mood = $mood;
    }
}

?>