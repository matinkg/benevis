<div class="container my-5">
    <div class="col-8 mx-auto">
        <h2 class="mb-4">Create New Post</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="input-cover-image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="input-cover-image" name="cover_image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="input-title" class="form-label">Title</label>
                <input type="text" class="form-control" id="input-title" name="title" required maxlength="100" placeholder="Enter post title">
            </div>
            <div class="mb-3">
                <label for="input-content" class="form-label">Content</label>
                <textarea class="form-control" id="input-content" rows="5" name="content" required placeholder="Write your post content here"></textarea>
            </div>
            <div class="mb-3">
                <label for="input-tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="input-tags" name="tags" placeholder="Enter tags separated by commas">
            </div>
            <input type="hidden" name="action" value="create-post">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
</div>