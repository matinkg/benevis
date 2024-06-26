<div class="container my-5">
    <h2 class="mb-4">Your Posts</h2>
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Date Created</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['created_at'] ?></td>
                    <td>
                        <?php foreach ($post['tags'] as $tag) : ?>
                            <span class="badge bg-secondary"><?= $tag ?></span>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <a href="<?= site_url("panel/editPost?id={$post['id']}") ?>" class="btn btn-outline-primary btn-sm" title="Edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-outline-danger btn-sm" onclick="deletePost(<?= $post['id'] ?>)" title="Delete">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
<script>
    function deletePost(postId) {
        if (confirm('Are you sure you want to delete this post?')) {
            // create a form, and submit it
            var form = document.createElement('form');
            form.action = '';
            form.method = 'post';
            
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'action';
            input.value = 'delete';

            var input2 = document.createElement('input');
            input2.type = 'hidden';
            input2.name = 'id';
            input2.value = postId;

            form.appendChild(input);
            form.appendChild(input2);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>