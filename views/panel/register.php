<!-- Registration Form -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="input-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="input-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="input-lastname" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="input-lastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="input-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="input-email" aria-describedby="emailHelp" name="email" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <input type="hidden" name="action" value="register">
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Already have an account? <a href="<?= site_url('panel/login') ?>" class="text-decoration-none">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>