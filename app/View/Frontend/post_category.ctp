<div class="content-page">
    <h1 class="title"><?php echo $category['BlogCategory']['name'] ?></h1>
    <div class="row">
        <div class="col-md-12 list-posts">
            <?php
            foreach ($posts as $item) {
                ?>
                <div class="media news">
                    <?php if ($item['Post']['image']): ?>
                        <a href="<?php echo $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>" class="pull-left">
                            <?php echo $this->Html->image(Configure::read('settings.imageDir').'150/'.$item['Post']['image']); ?>
                        </a>
                    <?php endif; ?>
                    <div class="media-body">
                        <a href="<?php echo $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>" class="media-heading"><?php echo $item['Post']['name'] ?></a>
                        <?php echo $this->Text->truncate(strip_tags($item['Post']['content']), 400) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="pagination pagination-sm" style="margin: auto">
                <?php
                if (@$category) {
                    $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'postCategory', 'slug' => $category['BlogCategory']['slug']);
                }
                echo $this->Paginator->numbers(Configure::read('settings.paginationOptions'));
                ?>
            </ul>
        </div>
    </div>
</div>