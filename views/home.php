<style>
    .card-img-top {
        object-fit: cover;
    }
</style>

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Benevis!</h1>
            <p class="lead mb-0">A simple blog that you can share whatever is on your mind.</p>
        </div>
    </div>
</header>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <?php foreach ($posts as $post) : ?>
                <div class="card mb-4">
                    <?php if ($post['cover_image']) : ?>
                        <img class="card-img-top" src="<?= asset_url($post['cover_image']) ?>" width="850" height="350" />
                    <?php else : ?>
                        <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" width="850" height="350" />
                    <?php endif; ?>

                    <div class="card-body">
                        <div class="small text-muted"><?= date('F j, Y', strtotime($post['created_at'])) ?> , by <?= $post['author'] ?></div>
                        <h2 class="card-title"><?= $post['title'] ?></h2>
                        <p class="card-text"><?= substr($post['content'], 0, 200) ?>...</p>
                        <a class="btn btn-primary" href="<?= site_url("post?id=$post[id]") ?>">Read more</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Pagination-->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center my-4">
                    <?php if ($pagination['current_page'] > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $pagination['current_page'] - 1; ?>">Newer</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                        </li>
                    <?php endif; ?>

                    <?php
                    $start = max(1, $pagination['current_page'] - 2);
                    $end = min($pagination['total_pages'], $pagination['current_page'] + 2);

                    if ($start > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                        <?php if ($start > 2) : ?>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <?php endif; ?>
                    <?php endif;

                    for ($i = $start; $i <= $end; $i++) :
                    ?>
                        <li class="page-item <?php echo ($i == $pagination['current_page']) ? 'active' : ''; ?>" <?php echo ($i == $pagination['current_page']) ? 'aria-current="page"' : ''; ?>>
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor;

                    if ($end < $pagination['total_pages']) : ?>
                        <?php if ($end < $pagination['total_pages'] - 1) : ?>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <?php endif; ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $pagination['total_pages']; ?>"><?php echo $pagination['total_pages']; ?></a></li>
                    <?php endif; ?>

                    <?php if ($pagination['current_page'] < $pagination['total_pages']) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $pagination['current_page'] + 1; ?>">Older</a>
                        </li>
                    <?php else : ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Older</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="text" name="q" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" />
                            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Tags</div>
                <div class="card-body">
                    <ul class="list-unstyled row row-cols-1 row-cols-sm-2 g-2 mb-0">
                        <?php foreach ($tags as $tag) : ?>
                            <li class="col"><a href="<?= site_url("?tag=$tag[title]") ?>" class="text-decoration-none"><?= $tag['title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- Side widget-->
            <!-- <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div> -->
        </div>
    </div>
</div>