<?php

include_once ROOT."/model/Post.php";

class PostController
{
    public function actionUserPosts($id):string
    {
        ob_start();
        $posts = array();
        $posts = Post::getUsersPosts($id);

        include ROOT.'/view/posts.php';
        
        $html = ob_get_clean();
        return $html;
    }
    public function actionPopular():string
    {
        ob_start();
        $posts = array();
        $posts = Post:: getPosts('upvotes');

        include ROOT.'/view/search.php';
        
        $html = ob_get_clean();
        return $html;
    }
    public function actionNew():string
    {
        ob_start();
        $posts = array();
        $posts = Post:: getPosts('data');

        include ROOT.'/view/search.php';
        
        $html = ob_get_clean();
        return $html;
    }
    public function actionSingle($id):string
    {
        ob_start();
        $post = array();
        $comments = array();
        $post = Post::getPost($id);
        $comments = $post[1];
        $post =$post[0];
        include ROOT.'/view/post.php';
        $html = ob_get_clean();
        return $html;    
    }

}