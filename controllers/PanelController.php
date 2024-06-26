<?php

class PanelController extends Controller {
    public function register() {
        if ($this->isUserLoggedIn()) {
            redirect(site_url());
        }

        if (isset($_POST['action']) && $_POST['action'] == 'register') {
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // check if email already exists
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->db->query($sql);
    
            if ($result->rowCount() > 0) {
                echo '<div class="alert alert-danger" role="alert">Email already exists!</div>';
            } else {
                $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$name', '$lastname', '$email', '$password')";
                $this->db->query($sql);
                $this->user_id = $this->db->lastInsertId();
                $_SESSION['user_id'] = $this->user_id;
                redirect(site_url());
            }
        }

        $content = $this->renderView('panel/register.php', [], true);
        $this->renderView('layout.php', ['content' => $content]);
    }

    public function login() {
        if ($this->isUserLoggedIn()) {
            redirect(site_url());
        }

        if (isset($_POST['action']) && $_POST['action'] == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // check if credentials are correct
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = $this->db->query($sql);
    
            if ($result->rowCount() > 0) {
                $user = $result->fetch(PDO::FETCH_ASSOC);
                $this->user_id = $user['id'];
                $_SESSION['user_id'] = $this->user_id;
                redirect(site_url());
            } else {
                echo '<div class="alert alert-danger" role="alert">Invalid credentials!</div>';
            }
        }

        $content = $this->renderView('panel/login.php', [], true);
        $this->renderView('layout.php', ['content' => $content]);
    }

    public function logout() {
        session_destroy();
        redirect(site_url());
    }

    public function createPost(){
        if (!$this->isUserLoggedIn()) {
            redirect(site_url('login'));
        }

        if (isset($_POST['action']) && $_POST['action'] == 'create-post') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $tags = $_POST['tags'];
            $coverImage = $_FILES['cover_image'];

            $coverImageName = $coverImage['name'];
            $coverImageTmpName = $coverImage['tmp_name'];
            $coverImageSize = $coverImage['size'];
            $coverImageError = $coverImage['error'];

            $coverImageExt = explode('.', $coverImageName);
            $coverImageActualExt = strtolower(end($coverImageExt));
            $allowed = ['jpg', 'jpeg', 'png'];

            if (in_array($coverImageActualExt, $allowed)) {
                if ($coverImageError === 0) {
                    if ($coverImageSize < 1000000) {
                        $coverImageNameNew = uniqid('', true) . '.' . $coverImageActualExt;
                        $coverImageDestination = 'public/uploads/' . $coverImageNameNew;
                        move_uploaded_file($coverImageTmpName, $coverImageDestination);

                        $sql = "INSERT INTO posts (title, content, cover_image, user_id) VALUES (?, ?, ?, ?)";
                        $stmt = $this->db->prepare($sql);
                        $stmt->execute([$title, $content, $coverImageDestination, $this->user_id]);

                        // store new tags
                        $postId = $this->db->lastInsertId();

                        $tags = explode(',', $tags);
                        foreach ($tags as $tag) {
                            $tag = trim($tag);
                            $sql = "SELECT * FROM tags WHERE title = '$tag'";
                            $result = $this->db->query($sql);

                            if ($result->rowCount() == 0) {
                                $sql = "INSERT INTO tags (title) VALUES ('$tag')";
                                $this->db->query($sql);
                                $tagId = $this->db->lastInsertId();
                            } else {
                                $tag = $result->fetch(PDO::FETCH_ASSOC);
                                $tagId = $tag['id'];
                            }

                            $sql = "INSERT INTO post_tags (post_id, tag_id) VALUES ($postId, $tagId)";
                            $this->db->query($sql);
                        }

                        redirect(site_url('panel/yourPosts'));
                        return;
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Your file is too big!</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">There was an error uploading your file!</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">You cannot upload files of this type!</div>';
            }
        }

        $content = $this->renderView('panel/create-post.php', [], true);
        $this->renderView('layout.php', ['content' => $content]);
    }

    public function editPost(){
        if (!$this->isUserLoggedIn()) {
            redirect(site_url('login'));
        }

        $postId = $_GET['id'];
    
        // Fetch the existing post
        $sql = "SELECT * FROM posts WHERE id = ? AND user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$postId, $this->user_id]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$post) {
            // Post not found or doesn't belong to the user
            redirect(site_url('panel/yourPosts'));
        }
    
        // Fetch existing tags
        $sql = "SELECT tags.title FROM tags JOIN post_tags ON tags.id = post_tags.tag_id WHERE post_tags.post_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$postId]);
        $existingTags = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $existingTagsString = implode(', ', $existingTags);
    
        if (isset($_POST['action']) && $_POST['action'] == 'edit-post') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $tags = $_POST['tags'];
            $coverImage = $_FILES['cover_image'];
    
            $coverImageDestination = $post['cover_image']; // Keep the existing image by default
    
            if ($coverImage['size'] > 0) {
                // New image uploaded, process it
                $coverImageName = $coverImage['name'];
                $coverImageTmpName = $coverImage['tmp_name'];
                $coverImageSize = $coverImage['size'];
                $coverImageError = $coverImage['error'];
    
                $coverImageExt = explode('.', $coverImageName);
                $coverImageActualExt = strtolower(end($coverImageExt));
                $allowed = ['jpg', 'jpeg', 'png'];
    
                if (in_array($coverImageActualExt, $allowed)) {
                    if ($coverImageError === 0) {
                        if ($coverImageSize < 1000000) {
                            $coverImageNameNew = uniqid('', true) . '.' . $coverImageActualExt;
                            $coverImageDestination = 'public/uploads/' . $coverImageNameNew;
                            move_uploaded_file($coverImageTmpName, $coverImageDestination);
    
                            // Delete old image if it exists
                            if (file_exists($post['cover_image'])) {
                                unlink($post['cover_image']);
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Your file is too big!</div>';
                            return;
                        }
                    } else {
                        echo '<div class="alert alert-danger" role="alert">There was an error uploading your file!</div>';
                        return;
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">You cannot upload files of this type!</div>';
                    return;
                }
            }
    
            // Update the post
            $sql = "UPDATE posts SET title = ?, content = ?, cover_image = ? WHERE id = ? AND user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$title, $content, $coverImageDestination, $postId, $this->user_id]);
    
            // Delete existing tag associations
            $sql = "DELETE FROM post_tags WHERE post_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$postId]);
    
            // Add new tags
            $tags = explode(',', $tags);
            foreach ($tags as $tag) {
                $tag = trim($tag);
                if (empty($tag)) continue;
    
                $sql = "SELECT * FROM tags WHERE title = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$tag]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if (!$result) {
                    $sql = "INSERT INTO tags (title) VALUES (?)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([$tag]);
                    $tagId = $this->db->lastInsertId();
                } else {
                    $tagId = $result['id'];
                }
    
                $sql = "INSERT INTO post_tags (post_id, tag_id) VALUES (?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$postId, $tagId]);
            }
    
            redirect(site_url('panel/yourPosts'));
            return;
        }
    
        $content = $this->renderView('panel/edit-post.php', ['post' => $post, 'existingTags' => $existingTagsString], true);
        $this->renderView('layout.php', ['content' => $content]);
    }


    public function yourPosts(){
        if (!$this->isUserLoggedIn()) {
            redirect(site_url('login'));
        }

        /* delete post */
        if (isset($_POST['action']) && $_POST['action'] == 'delete') {
            $postId = $_POST['id'];
            $sql = "DELETE FROM posts WHERE id = ? AND user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$postId, $this->user_id]);
        }


        $sql = "SELECT * FROM posts WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->user_id]);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM post_tags JOIN tags ON post_tags.tag_id = tags.id WHERE post_id IN (SELECT id FROM posts WHERE user_id = ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->user_id]);
        $postTags = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // join tags with posts
        foreach ($posts as $key => $post) {
            $posts[$key]['tags'] = [];
            foreach ($postTags as $postTag) {
                if ($postTag['post_id'] == $post['id']) {
                    $posts[$key]['tags'][] = $postTag['title'];
                }
            }
        }

        $content = $this->renderView('panel/your-posts.php', ['posts' => $posts], true);
        $this->renderView('layout.php', ['content' => $content]);
    }
}