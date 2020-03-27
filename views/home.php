<?php if($isLoggedIn)  { ?>
<div class="row">
    <div class="col-md-12">
        <form action="./index.php?page=addTweet" method="post">
            <div>
                <?= $message?>
            </div>
            <div>
                <label>
                    Email
                    <textarea name="email" class="form-control"></textarea>
                </label>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Register"/>
            </div>
        </form>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-md-12">
        This is home
    </div>
</div>