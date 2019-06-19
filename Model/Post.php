<?php

namespace App;


class Post extends Model
{


    public function getPosts()
    {
        $posts = $this->executeRequest("SELECT * FROM Post");
        $posts = $posts->fetchAll();
        return $posts;
    }

    public function getPost($idPost)
    {
        $post = $this->executeRequest("Select * FROM Post WHERE Id = ?", array($idPost));
        $post = $post->fetchAll();
        $post = $post[0];
        return $post;
    }

    public function deletePost($idPost)
    {
        $req = $this->executeRequest("DELETE FROM Post WHERE Id = ?", array($idPost));
        $req = $this->executeRequest("DELETE FROM Comment WHERE Id_Post = ?", array($idPost));

    }

    public function idPostExist($idPost)
    {
        $exist = $this->executeRequest("SELECT COUNT(Id) FROM Post WHERE `Id`=?", array($idPost));
        $exist = $exist->fetch()[0];
        if ($exist == '1') {
            return true;
        } else {
            return false;
        }
    }

    public function addPost($title, $content, $status)
    {
        $this->executeRequest("INSERT INTO `post`(`Title`, `Created_at`, `Content`, `Status`) VALUES (?,NOW(),?,?)", array($title, $content, $status));
    }

    public function editPost($id, $title, $content, $status)
    {
        $this->executeRequest("UPDATE `post` SET `Title`=?,`Content`=?,`Status`=? WHERE Id=?", array($title, $content, $status, $id));

    }


}