<div class="row">
    <div class="col-md-6 offset-md-4">
        <h2>Login</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-6 offset-md-4">
        <form action="./index.php?page=login" method="post">
            <div>
                <?= $message?>
            </div>
            <div>
                <label>
                    Email
                    <input type="email" name="email" value="" class="form-control"/>
                </label>
            </div>
            <div>
                <label>
                    Password
                    <input type="password" name="password" value="" class="form-control"/>
                </label>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Register"/>
            </div>
        </form>
    </div>
</div>