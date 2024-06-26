<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="mb-0"><?php echo $post['title']; ?></h4>
                </div>
                <div class="card-body">
                    <!-- Image -->
                    <div class="mb-4">
                        <?php if ($post['cover_image']) : ?>
                            <img class="card-img-top" src="<?= asset_url($post['cover_image']) ?>" width="850" height="350" />
                        <?php else : ?>
                            <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" width="850" height="350" />
                        <?php endif; ?>
                    </div>

                    <!-- Content -->
                    <p class="card-text"><?php echo nl2br($post['content']); ?></p>

                    <!-- Categories -->
                    <div class="mb-3">
                        <?php foreach ($tags as $tag) : ?>
                            <span class="badge bg-secondary me-1"><?= $tag['title']; ?></span>
                        <?php endforeach; ?>
                    </div>

                    <!-- Author and Date -->
                    <p class="card-text">
                        <small class="text-muted">
                            Posted by <?php echo $post['author_first_name'] . ' ' . $post['author_last_name']; ?>
                            on <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                        </small>
                    </p>
                </div>
            </div>

            <!-- Back to Posts -->
            <div class="mt-4 text-center">
                <a href="<?= site_url() ?>" class="btn btn-outline-primary">Back to Posts</a>
            </div>
        </div>
    </div>
</div>