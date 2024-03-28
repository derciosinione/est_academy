<?php

class CourseModel
{
    private $id;
    private $name;
    private $maxStudent;
    private $categoryId;
    private $creatorId;
    private $isActive;
    private $isDeleted;
    private $createdAt;
    private $updatedAt;

    public function __construct($name, $maxStudent, $categoryId, $creatorId, $isActive, $isDeleted, $createdAt, $updatedAt)
    {
        $this->name = $name;
        $this->maxStudent = $maxStudent;
        $this->categoryId = $categoryId;
        $this->creatorId = $creatorId;
        $this->isActive = $isActive;
        $this->isDeleted = $isDeleted;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters and Setters
    // Implemente os getters e setters conforme necessário
}