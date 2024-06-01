<?php
class Member {
    private $member_id;
    private $id_num;
    private $image;
    private $name;
    private $surname;
    private $password;
    private $gender;
    private $dob;
    private $role;
    private $mgr;
    private $tcs;
    private $username;

    // Constructor
    public function __construct($member_id, $id_num, $image, $name, $surname, $password, $gender, $dob, $role, $mgr, $tcs, $username) {
        $this->member_id = $member_id;
        $this->id_num = $id_num;
        $this->image = $image;
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->role = $role;
        $this->mgr = $mgr;
        $this->tcs = $tcs;
        $this->username = $username;
    }

    // Getter methods
    public function getUsername() {
        return $this->username;
    }

    public function getIdNum() {
        return $this->id_num;
    }

    public function getMemberId() {
        return $this->member_id;
    }

    public function getImage() {
        return $this->image;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getDob() {
        return $this->dob;
    }

    public function getRole() {
        return $this->role;
    }

    public function getMgr() {
        return $this->mgr;
    }

    public function getTcs() {
        return $this->tcs;
    }

    // Setter methods
    public function setUsername($username) {
        $this->username = $username;
    }
    public function setIdNum($id_num) {
        $this->id_num = $id_num;
    }

    public function setMember_id($member_id) {
        $this->member_id = $member_id;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setMgr($mgr) {
        $this->mgr = $mgr;
    }

    public function setTcs($tcs) {
        $this->tcs = $tcs;
    }
}
?>