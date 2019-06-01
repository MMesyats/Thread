<?php

class Post
{
    
    public static function getPosts(string $field)
    {
        $posts = array();

        $db=DB::getConnection();
        $result = $db->query('SELECT id,article,author,'.
        'author_id,data,content,upvotes,downvotes,'.
        'comments_count FROM posts ORDER BY '.$field.' DESC');

        for($i=0; $row = $result->fetch(); $i++)
        {
            $posts[$i] = $row;
        }
        return $posts;

    }
    public static function getUsersPosts($id)
    {
        $posts = array();

        $db=DB::getConnection();
        $result = $db->query('SELECT id,article,author,'.
        'author_id,data,content,upvotes,downvotes,'.
        'comments_count FROM posts WHERE author_id ='.
        $id.' ORDER BY data DESC');

        for($i=0; $row = $result->fetch(); $i++)
        {
            $posts[$i] = $row;
        }
        return $posts;
    }

    public static function getPost($id)
    {
        $id=intval($id);
        
        $db=DB::getConnection();

        $result = $db->query('SELECT id,article,author,'.
        'author_id,data,content,upvotes,downvotes,comments_id,'.
        'comments_count FROM posts WHERE id ='.$id);
        $post = array();
        $comments = array();
        if($post = $result->fetch())
        { 
            $result = $db->query("SELECT * FROM comments WHERE post_id={$id} ORDER BY date DESC");
            for($i=0;$row=$result->fetch();$i++)
            {
                $comments[$i] = $row;
            }
            return array($post,$comments);
        }
    }
}