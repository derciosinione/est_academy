<?php

use basedados\DbContext;

require_once __DIR__ . '/UserInterface.php';
require_once __DIR__ . '/../basedados/basedados.h';
require_once __DIR__ . '/Constants.php';
require_once __DIR__ . '/UserModel.php';
require_once __DIR__ . '/GenericResponse.php';

class UserService implements UserInterface
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new DbContext();
        $this->connection = $this->db->getConnection();
    }

    public function getDefaultSqlQuery(): string
    {
        return /** @lang text */ "
            SELECT
                u.Id,
                u.Name,
                u.Email,
                u.Username,
                u.NIF,
                u.ProfileId,
                p.Name 'Profile',
                u.PhoneNumber,
                u.BirthDay,
                u.AvatarUrl,
                u.IsApproved,
                u.CreatedAt
            FROM Users u
            JOIN Profiles p ON u.ProfileId = p.Id
            WHERE 1=1
            AND !u.IsDeleted
            AND u.IsActive";
    }

    public function login($email, $password)
    {
        $query = $this->getDefaultSqlQuery() . " AND (u.Email='$email' OR u.Username='$email') AND u.PasswordHash='$password'";

        $result = $this->db->executeSqlQuery($query);

        if ($result == null) return null;

        $row = $result->fetch_assoc();

        if ($row==null) return null;

        return $this->userInstance($row);
    }

    public function logOut()
    {
        // TODO: Implement logOut() method.
    }

    public function changePassword($password, $confirmPassword): bool
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
    public function getAllUserStaff(): array
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
        $query = $this->getDefaultSqlQuery() . " AND u.Id = $userId";

        $result = $this->db->executeSqlQuery($query);

        if ($result == null) return null;

        $row = $result->fetch_assoc();

        if ($row==null) return null;

        return $this->userInstance($row);
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


    /**
     * @return UserModel[]
     */
    public function getAllStudents(): array
    {
        $query = $this->getDefaultSqlQuery() . $this->db->getOrderBy("u") . $this->db->getQueryLimit(9);

        $result = $this->db->executeSqlQuery($query);

        $data = [];

        if ($result == null) return $data;

        while ($row = $result->fetch_assoc()) {
            $data [] = $this->userInstance($row);
        }

        return $data;
    }

    /**
     * @param array $row
     * @return UserModel
     */
    private function userInstance(array $row): UserModel
    {
        $user = new UserModel($row["Id"],
            $row["Name"],
            $row["Email"],
            $row["Username"],
            $row["PhoneNumber"],
            $row["BirthDay"],
            $row["ProfileId"]);

        $user->createdAt = $row["CreatedAt"];
        $user->setNif($row["NIF"]);
        $user->setProfileName($row["Profile"]);
        $user->setAvatarUrl($row["AvatarUrl"]);
        $user->setApprovedStatus($row["IsApproved"]);

        return $user;
    }

    /**
     * @param $id
     * @param $name
     * @param $username
     * @param $email
     * @param $nif
     * @param $phoneNumber
     * @param $birthDay
     * @return GenericResponse
     */
    public function updateUserInfo($id, $name, $username, $email, $nif, $phoneNumber, $birthDay): GenericResponse
    {
        if (!Constants::isValidDateFormat($birthDay)) {
            return new GenericResponse(0, false, "A data de nascimento deve estar no formato yyyy/mm/dd.");
        }

        $query = sprintf("UPDATE Users SET
                     Name= '%s',
                     Email='%s',
                     Username='%s',
                     Nif='%s',
                     PhoneNumber='%s',
                     BirthDay='%s'
                  WHERE Id=%d",
             $name, $email, $username, $nif, $phoneNumber, $birthDay, $id);

        $result = $this->db->executeSqlQuery($query);

        if ($result == null) {
            return new GenericResponse(0, false, "Não foi possivel atualizar as informações, tente novamente!");
        }

        return new GenericResponse($id, true);
    }


}