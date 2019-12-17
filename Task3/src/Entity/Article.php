<?php
namespace App\Entity;

abstract class Article
{
    /**
     * @param User $user
     * @return mixed
     * Change author article
     */
    abstract public function setAuthor(User $user);

    abstract public function getAuthor():User;
}