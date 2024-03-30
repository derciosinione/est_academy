<?php

interface CourseInterface
{
    public function getAll();
    public function getById($id);

    public function getAllByCategory($categoryId);

    public function create($name, $categoryId, $price, $maxStudent, $description, $creatorId);

    public function update($name, $categoryId, $price, $maxStudent, $description, $creatorId);
}