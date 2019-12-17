<?php
namespace App\Entity;

abstract class User
{
    /**
     * Add article to user
     * @param Article $article
     * @return mixed
     */
    abstract public function addArticle(Article $article);

    /**
     * @return Article[]
     */
    abstract public function getArticles():array;
}