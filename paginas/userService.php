<?php


use basedados\DbContext;

require_once __DIR__ . '/IUser.php';
require_once __DIR__ . '/../basedados/basedados.php';
require_once __DIR__ . '/constants.php';

class userService implements IUser
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new DbContext();
        $this->connection = $this->db->getConnection();
    }

    public function login($email, $password)
    {
//        $password = md5($password);
        $query = "SELECT Id, Email, UserName, PasswordHash FROM Users WHERE Email=? AND PasswordHash=?";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("ss", $email, $password);

        $row = $this->db->executeSqlCommand($statement);

        if ($row == null) return null;

        return new UserModel($row["Id"], null, $row["Email"]);
    }

    public function logOut()
    {
        // TODO: Implement logOut() method.
    }

    public function changePassword($password, $confirmPassword)
    {
        if ($password != $confirmPassword) return false;

        //TODO: Implementar codigo de alteracao da senha no banco de dados
        return true;
    }

    /**
     * Get all users from the database.
     *
     * @return userModel[] Array of userModel objects.
     */
    public function getAllUserStaff()
    {
        $users = [];
        $query = "SELECT * FROM Users WHERE IsStaff";

        $data = $this->db->executeSqlQuery($query);

        if ($data == null) return $users;

        while ($row = $data) {
            $users[] = new UserModel($row["Id"], $row["Name"], $row["Email"], $row["PhoneNumber"], $row["BirthDay"], $row["ProfileId"]);
        }

        return $users;
    }


    /**
     * Get the user with provided id from the database.
     *
     * @return userModel userModel objects.
     */
    public function getUserById($userId)
    {
        $query = "SELECT * FROM Users WHERE Id = ?";

        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $userId);

        $row = $this->db->executeSqlCommand($statement);

        if ($row == null) return null;

        return new UserModel($row["Id"], $row["Name"], $row["Email"], $row["PhoneNumber"], $row["BirthDay"], $row["ProfileId"]);
    }

    /**
     * @param $email
     * @return userModel|null
     */
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM Users WHERE Email = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $email);

        $row = $this->db->executeSqlCommand($statement);

        if ($row == null) return null;

        $user = new UserModel($row["Id"], $row["Name"], $row["Email"]);
        $user->setPasswordHash($row["PasswordHash"]);
        return $user;
    }

    /**
     * if the user was created it returns the userId, otherwise it returns the error message
     * @param $name
     * @param $email
     * @param $nif
     * @param $birthDay
     * @param string $phoneNumber
     * @param string $avatarUrl
     * @return integer|string
     */
    public function createManager($name, $email, $nif, $birthDay, $phoneNumber = "", $avatarUrl = "")
    {
        //TODO: Get the manager profile id from database
        //TODO: Implement method to upload image
        //TODO: Update the username size in database

        $managerProfile = Constants::$managerId;

        $query = sprintf("INSERT INTO Users (
            Name, Email, UserName, Nif, BirthDay, PhoneNumber, 
            ProfileId, AvatarUrl, IsStaff) VALUES 
            ('%s', '%s', '%s', '%s', '%s', '%s', %d,'%s', true)",
            $name, $email, $email, $nif, $birthDay, $phoneNumber,
            $managerProfile, 'https://images.unsplash.com/photo-1517849845537-4d257902454a?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

        $userId = $this->db->executeInsertQuery($query);

        if ($userId == null || $userId == 0) return "Nao foi possivel criar o gerente";

        return $userId;
    }
}