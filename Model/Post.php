<?php

namespace App;


class Post extends Model
{


    public function getPosts()
    {
        $posts = $this->executeRequest("SELECT *, DATE_FORMAT(Created_At,'%d/%m/%Y') AS jour,DATE_FORMAT(Created_At,'%Hh%imin') AS heure  FROM post");
        $posts = $posts->fetchAll();
        return $posts;
    }

    public function getPostsDesc()
    {
        $posts = $this->executeRequest("SELECT *, DATE_FORMAT(Created_At,'%d/%m/%Y') AS jour,DATE_FORMAT(Created_At,'%Hh%imin') AS heure  FROM post ORDER BY Created_At DESC ");
        $posts = $posts->fetchAll();
        return $posts;
    }

    public function getPostsPerStatus($status)
    {
        $posts = $this->executeRequest("SELECT *, DATE_FORMAT(Created_At,'%d/%m/%Y') AS jour,DATE_FORMAT(Created_At,'%Hh%imin') AS heure  FROM post WHERE `Status`=?",array($status));
        return $posts->fetchAll();

    }
    public function getPost($idPost)
    {
        $post = $this->executeRequest("Select *,DATE_FORMAT(Created_At,'%d/%m/%Y') AS jour,DATE_FORMAT(Created_At,'%Hh%imin') AS heure FROM post WHERE Id = ?", array($idPost));
        $post = $post->fetchAll();
        $post = $post[0];
        return $post;
    }

    public function deletePost($idPost)
    {
        $req = $this->executeRequest("DELETE FROM post WHERE Id = ?", array($idPost));
        $req = $this->executeRequest("DELETE FROM comment WHERE Id_Post = ?", array($idPost));

    }

    public function idPostExist($idPost)
    {
        $exist = $this->executeRequest("SELECT COUNT(Id) FROM post WHERE `Id`=?", array($idPost));
        $exist = $exist->fetch()[0];
        if ($exist == '1') {
            return true;
        } else {
            return false;
        }
    }

    public function addPostWithFile($title, $content,$filename,$status)
    {
        $this->executeRequest("INSERT INTO `post`(`Title`, `Created_at`, `Content`,`Img_Name`, `Status`) VALUES (?,NOW(),?,?,?)", array($title, $content,$filename, $status));
    }

    public function addPostWithoutFile($title, $content,$status)
    {
        $this->executeRequest("INSERT INTO `post`(`Title`, `Created_at`, `Content`,`Status`) VALUES (?,NOW(),?,?)", array($title, $content, $status));
    }

    public function editPostWithFile($id, $title, $content,$filename,$status)
    {
        $this->executeRequest("UPDATE `post` SET `Title`=?,`Content`=?,`Img_Name`=?,`Status`=?  WHERE Id=?", array($title, $content,$filename,$status, $id));

    }

    public function editPostWithoutFile($id, $title, $content,$status)
    {
        $this->executeRequest("UPDATE `post` SET `Title`=?,`Content`=?,`Status`=?  WHERE Id=?", array($title, $content,$status, $id));

    }

}