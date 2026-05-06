<?php

class Product
{
    private $id;
    private $title;
    private $description;
    private $price;
    private $filePath;
    private $fileType;
    private $createdBy;
    private $updatedBy;

    public function __construct($id, $title, $description, $price, $filePath = null, $fileType = null, $createdBy = null, $updatedBy = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->filePath = $filePath;
        $this->fileType = $fileType;
        $this->createdBy = $createdBy;
        $this->updatedBy = $updatedBy;
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getPrice() { return $this->price; }
    public function getFilePath() { return $this->filePath; }
    public function getFileType() { return $this->fileType; }
    public function getCreatedBy() { return $this->createdBy; }
    public function getUpdatedBy() { return $this->updatedBy; }
}
