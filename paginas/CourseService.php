<?php

use basedados\DbContext;

require_once __DIR__ . '/CourseInterface.php';
require_once __DIR__ . '/UserInterface.php';
require_once __DIR__ . '/CategoryModel.php';
require_once __DIR__ . '/UserModel.php';
require_once __DIR__ . '/CourseModel.php';
require_once __DIR__ . '/GenericResponse.php';
require_once __DIR__ . '/../basedados/basedados.h';


class CourseService implements CourseInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new DbContext();
    }

    public function getDefaultSqlQuery()
    {
        return /** @lang text */ "
            SELECT 
                   c.Id,
                   c.Name,
                   ct.Name Category,
                   c.Price,
                   c.Description,
                   c.MaxStudent,
                   c.CreatorId,
                   c.CategoryId,
                   u.Name CreatorName,
                   c.ImageUrl,
                   c.IsActive,
                   c.CreatedAt
            FROM Courses c
            JOIN Categories ct ON c.CategoryId = ct.Id
            JOIN Users u on c.CreatorId = u.Id
            WHERE 1=1
            AND !c.IsDeleted ";
    }

    /**
     * @return CourseModel[]
     */
    public function getAll()
    {
        $query = $this->getDefaultSqlQuery() . $this->db->getOrderBy("c") . $this->db->getQueryLimit(8);

        $result = $this->db->executeSqlQuery($query);

        if ($result == null) return null;

        $courses = [];

        while ($row = $result->fetch_assoc()) {
            $courses [] = $this->courseInstance($row);
        }

        return $courses;
    }

    /**
     * @param $categoryId
     * @return CategoryModel[]
     */
    public function getAllByCategory($categoryId)
    {
        $query = $this->getDefaultSqlQuery() . " AND c.CategoryId=$categoryId " . $this->db->getOrderBy("c");

        $data = $this->db->executeSqlQuery($query);

        if ($data == null) return null;

        $courses = [];

        while ($row = $data->fetch_assoc()) {
            $courses[] = $this->courseInstance($row);;
        }

        return $courses;
    }

    /**
     * @param $id
     * @return CourseModel
     */
    public function getById($id)
    {
        $query = $this->getDefaultSqlQuery() . " AND c.Id=$id ";

        $result = $this->db->executeSqlQuery($query);

        if ($result == null) return null;

        $row = $result->fetch_assoc();

        if ($row==null) return null;

        return $this->courseInstance($row);
    }

    /**
     * @param $creatorId
     * @param $name
     * @param $categoryId
     * @param $price
     * @param $description
     * @param $maxStudent
     * @param $imageUrl
     * @return GenericResponse
     */
    public function create($creatorId, $name, $categoryId, $price, $description, $maxStudent, $imageUrl): GenericResponse
    {
        $query = sprintf("INSERT INTO Courses (
                     Name,
                     CategoryId, 
                     Price,
                     Description, 
                     CreatorId, 
                     ImageUrl,
                     IsActive 
                     ) VALUES
            ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            $name, $categoryId, $price, $description, $creatorId,
            $imageUrl, true);

        $courseId = $this->db->executeInsertQuery($query);

        if ($courseId == null || $courseId == 0) {
            return new GenericResponse(0, false, "Não foi possivel criar o curso, tente novamente!");
        }

        return new GenericResponse($courseId, true);
    }

    /**
     * @return GenericResponse
     */
    public function update($id, $creatorId, $name, $categoryId, $price, $description, $maxStudent, $imageUrl)
    {
        $query = sprintf("UPDATE Courses SET
                     CreatorId = %d,
                     Name = '%s',
                     CategoryId = %d,
                     Price = %f,
                     Description = '%s',
                     MaxStudent = %d,
                     ImageUrl = '%s'
                  WHERE Id = %d",
            $creatorId, $name, $categoryId, $price, $description, $maxStudent, $imageUrl, $id);

        $result = $this->db->executeSqlQuery($query);

        if ($result == null) {
            return new GenericResponse(0, false, "Não foi possivel atualizar o curso, tente novamente!");
        }

        return new GenericResponse($id, true);
    }

    /**
     * @param array $row
     * @return CourseModel
     */
    private function courseInstance(array $row)
    {
        $course = new CourseModel();
        $course->setId($row["Id"]);
        $course->setIsActive($row["IsActive"]);
        $course->setCreatedAt($row["CreatedAt"]);
        $course->name = $row["Name"];
        $course->price = $row["Price"];
        $course->description = $row["Description"];
        $course->maxStudent = $row["MaxStudent"];
        $course->categoryId = $row["CategoryId"];
        $course->creatorId = $row["CreatorId"];
        $course->imageUrl = $row["ImageUrl"];

        $creator = new UserModel($row["Id"], $row["CreatorName"]);
        $course->setCreator($creator);

        $category = new CategoryModel($row["Id"], $row["Category"]);
        $course->setCategory($category);
        return $course;
    }
}