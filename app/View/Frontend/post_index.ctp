<div class="content-page">
    <h1 class="title"><?php echo $post['Post']['name'] ?></h1>
    <div class="content">
        <?php echo $post['Post']['content'] ?>
    </div>
    <?php echo $this->element('frontend/comment_facebook') ?>
</div>

<?php $this->start('sidebar');?>
<div class="block-sidebar cungchude">
    <h3 class="title red">Tin tức cùng chủ đề</h3>
    <div class="description">
        <ul class="list-group list-unstyled categories">
            <?php
            foreach ($postsInCat as $item) {
                echo '<li title="'.$item['Post']['name'].'">'.$this->Html->link($item['Post']['name'], array('action' => 'postIndex', 'slug' => $item['Post']['slug'])).'</li>';
            }
            ?>
        </ul>
    </div>
</div>
<?php $this->end('sidebar'); ?>
