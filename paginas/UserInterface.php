<?php


interface UserInterface
{
    public function login($email, $password);

    public function logOut();

    public function changePassword($email, $currentPassword, $password, $confirmPassword);

    public function getUserById($userId);

    public function getUserByEmail($email);

    public function getAllUserStaff();
    public function getAllStudents();

    public function createInstructor($name, $email, $nif, $birthDay, $phoneNumber, $password, $avatarUrl);
    public function createAdmin($name, $email, $nif, $birthDay, $phoneNumber, $password, $avatarUrl);
    public function createStudent($name, $email, $nif, $birthDay, $phoneNumber, $password, $avatarUrl);
    public function updateUserInfo($id, $name, $username, $email, $nif, $phoneNumber, $birthDay);
}