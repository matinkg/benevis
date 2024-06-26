<!-- Login Form -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="input-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="input-email" aria-describedby="emailHelp" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <input type="hidden" name="action" value="login">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Don't have an account? <a href="<?= site_url('panel/register') ?>" class="text-decoration-none">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>