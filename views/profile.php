<div class="row">
    <div class="col-md-12">
        <h2>My Account</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-6 offset-md-4">
        <form action="./index.php?page=profile" method="post">
            <div>
                <?= $message?>
            </div>
            <div>
                <label>
                    Name
                    <input type="text" name="name" value="<?= $name?>" class="form-control"/>
                </label>
            </div>
            <div>
                <label>
                    Email
                    <input type="email" name="email" value="<?= $email?>" class="form-control"/>
                </label>
            </div>
            <div>
                <label>
                    Old password
                    <input type="password" name="oldPassword" value="" class="form-control"/>
                </label>
            </div>
            <div>
                <label>
                    Password
                    <input type="password" name="password" value="" class="form-control"/>
                </label>
            </div>
            <div>
                <label>
                    Check Password
                    <input type="password" name="checkPassword" value="" class="form-control"/>
                </label>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Register"/>
            </div>
        </form>
    </div>
</div>