<?php

namespace App\Model;

use DateTimeInterface;

interface TimesTempedInterface
{
    public function getCreatedAt():?DateTimeInterface;

    public function setCreatedAt(\DateTimeInterface $createdAt);

    public function getUpdateAt():?DateTimeInterface;

    public function setUpdateAt(?\DateTimeInterface $updateAt);
}