<?php if($isLoggedIn)  { ?>
<div class="row">
    <div class="col-md-12">
        <form action="./index.php?page=addTweet" method="post">
            <div>
                <?= $message?>
            </div>
            <div>
                <label>
                    Tweet
                    <textarea name="text" class="form-control"></textarea>
                </label>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Tweet"/>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ul class="tweetsList">
            <?php if(empty($tweets)) { ?>
            <li>NO TWEETS</li>
            <?php } else {
                foreach ($tweets as $k=>$v) {?>
                    <li>
                        <div><?= $v->getUserId();?></div>
                        <div>
                            <?= nl2br($v->getText())?>
                        </div>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-md-12">
        This is home
    </div>
</div>