<?php


interface UserInterface
{
    public function login($email, $password);

    public function logOut();

    public function changePassword($password, $confirmPassword);

    public function getUserById($userId);

    public function getUserByEmail($email);

    public function getAllUserStaff();
    public function getAllStudents();

    public function createManager($name, $email, $nif, $birthDay, $phoneNumber, $avatarUrl);
}