<div class="container my-5">
    <div class="col-8 mx-auto">
        <h2 class="mb-4">Edit Post</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="input-cover-image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="input-cover-image" name="cover_image" accept="image/*">
                <?php if (!empty($post['cover_image'])): ?>
                    <p class="text-muted">Leave empty to keep the current image</p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="input-title" class="form-label">Title</label>
                <input type="text" class="form-control" id="input-title" name="title" required maxlength="100" placeholder="Enter post title" value="<?= htmlspecialchars($post['title']) ?>">
            </div>
            <div class="mb-3">
                <label for="input-content" class="form-label">Content</label>
                <textarea class="form-control" id="input-content" rows="5" name="content" required placeholder="Write your post content here"><?= htmlspecialchars($post['content']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="input-tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="input-tags" name="tags" placeholder="Enter tags separated by commas" value="<?= htmlspecialchars($existingTags) ?>">
            </div>
            <input type="hidden" name="action" value="edit-post">
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
</div>
