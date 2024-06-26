<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->isUserLoggedIn();

        /* if search */
        if (isset($_GET['q'])) {
            $q = $_GET['q'];
            $sql = "SELECT posts.*, users.first_name author FROM posts JOIN users ON posts.user_id = users.id WHERE title LIKE '%$q%' OR content LIKE '%$q%' ORDER BY id DESC";
        } else if (isset($_GET['tag'])) {
            $tag = $_GET['tag'];
            $sql = "SELECT posts.*, users.first_name author FROM posts JOIN users ON posts.user_id = users.id JOIN post_tags ON posts.id = post_tags.post_id JOIN tags ON post_tags.tag_id = tags.id WHERE tags.title = '$tag' ORDER BY id DESC";
        } else {
            $sql = "SELECT posts.*, users.first_name author FROM posts JOIN users ON posts.user_id = users.id ORDER BY id DESC";
        }

        /* pagination */
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total_posts = $this->db->query("SELECT COUNT(*) FROM posts")->fetchColumn();
        $total_pages = ceil($total_posts / $limit);

        $sql .= " LIMIT $limit OFFSET $offset";
        $posts = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $tags = $this->db->query("SELECT * FROM tags")->fetchAll(PDO::FETCH_ASSOC);

        $content = $this->renderView('home.php', [
            'posts' => $posts,
            'tags' => $tags,
            'pagination' => [
                'total_pages' => $total_pages,
                'current_page' => $page
            ]
        ], true);
        $this->renderView('layout.php', ['content' => $content]);
    }
}
