<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url() ?>">Benevis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if ($this->isUserLoggedIn()) : ?>
                    <li class="nav-item"><a class="nav-link <?= isCurrentUrl('panel/createPost') ? 'active' : '' ?>" href="<?= site_url('panel/createPost') ?>">Create Post</a></li>
                    <li class="nav-item"><a class="nav-link <?= isCurrentUrl('panel/yourPosts') ? 'active' : '' ?>" href="<?= site_url('panel/yourPosts') ?>">Your Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('panel/logout') ?>">Logout</a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('panel/login') ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('panel/register') ?>">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>