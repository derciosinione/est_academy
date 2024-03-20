<?php

class userModel
{
    public $id;
    public $name;
    public $userName;
    public $email;
    public $phoneNumber;
    public $avatarUrl;
    public $birthDay;
    private $passwordHash;
    public $profileId;
    public $isStaff;
    public $isActive;
    public $isDeleted;
    public $createdAt;
    public $updatedAt;

    /**
     * @param $id
     * @param $name
     * @param $email
     * @param $phoneNumber
     * @param $birthDay
     * @param $profileId
     */
    public function __construct($id = null, $name = null, $email = null, $phoneNumber = null, $birthDay = null, $profileId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->birthDay = $birthDay;
        $this->profileId = $profileId;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @param mixed $passwordHash
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = md5($passwordHash);
    }

}