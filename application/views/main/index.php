<?php if (!defined("MCPROJECT")) {
    exit("Hacking Attempt!");
} ?>

<h3 style="font-size: 100%;"><i class="fa fa-newspaper-o" style="padding: 7px" aria-hidden="true"></i>НОВОСТИ О СЕРВЕРАХ</h3>
<?php if (empty($list)) : ?>
    <p>Список постов пуст</p>
<?php else : ?>
    <div class="head-block">
        <?php foreach ($list as $val) : ?>
            <div class="post-preview">
                <h1><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></h1>
                <img src="/public/materials/posts/<?php echo $val['id']; ?>.jpg" class="img-fluid" alt="Responsive image" width="653">
                <hr>
                <span class="subheading"><?php echo htmlspecialchars($val['description'], ENT_QUOTES); ?></span>
                <p><?php echo $val['text']; ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
        <div class="clearfix">
            <?php echo $pagination; ?>
        </div>
    </div>
<?php endif; ?>