<?php

class PostController extends Controller {
    public function index() {
        $postId = $_GET['id'];
    
        // Fetch the post
        $sql = "SELECT posts.*, users.first_name AS author_first_name, users.last_name AS author_last_name FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$postId]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$post) {
            // Post not found or doesn't belong to the user
            redirect(site_url('panel/yourPosts'));
        }
    
        // Fetch tags
        $sql = "SELECT tags.title FROM tags JOIN post_tags ON tags.id = post_tags.tag_id WHERE post_tags.post_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$postId]);
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $content = $this->renderView('posts/view-post.php', ['post' => $post, 'tags' => $tags], true); 
        $this->renderView('layout.php', ['content' => $content]);
    }
}