<?php

interface CourseInterface
{
    public function getAll();
    public function getById($id);

    public function getAllByCategory($categoryId);

    public function create($creatorId, $name, $categoryId, $price, $description, $maxStudent, $imageUrl);

    public function update($creatorId, $name, $categoryId, $price, $description, $maxStudent, $imageUrl);
}