<?php

class UserModel
{
    public $id;
    public $name;
    public $email;
    public $phoneNumber;
    public $avatarUrl;
    public $birthDay;
    public $profileId;
    public $profileName;
    public $isStaff;
    public $isActive;
    public $isDeleted;
    public $createdAt;
    public $updatedAt;
    private $passwordHash;

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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
    }

    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;
    }

    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
    }

    public function setIsStaff($isStaff)
    {
        $this->isStaff = $isStaff;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

}