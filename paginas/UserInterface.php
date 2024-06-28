<?php


interface UserInterface
{
    public function login($email, $password);

    public function logOut();

    public function changePassword($email, $currentPassword, $password, $confirmPassword);

    public function getUserById($userId);

    public function getUserByEmail($email);

    public function getAllUserStaff($search = '');

    public function getAllStudents($search = '');

    public function getAllInstructors($search = '');

    public function getAllAdmin($search = '');

    public function getAllUserByProfile($profileId);

    public function createUser($name, $email, $nif, $birthDay, $phoneNumber, $password, $profileId, $avatarUrl);

    public function createStudent($name, $email, $nif, $birthDay, $phoneNumber, $password, $avatarUrl);

    public function updateUserInfo($id, $name, $email, $nif, $phoneNumber, $profileId, $birthDay);

    public function deleteUser($id);

    public function handlerAdmitUser($studentId, $isApproved = true);
}