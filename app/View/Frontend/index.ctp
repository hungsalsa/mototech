<h1 style="font-size: 20px;color: #000;"><?= isset($title_for_layout)? $title_for_layout:'' ?></h1>
<div class="row listNewsHomePage">
    <?php
    $index = 0;
    foreach ($newsHomepage as $item) {
        $index++;
        if (!$item['Post']['feature']) {
            continue;
        }
        $class = 'col-md-4 col-sm-6';
        $sizeImage = '300';
        if ($index <= 2) {
            $class = 'col-sm-6';
            $sizeImage = '500';
        }
        echo '<div class="'.$class.'"><div class="new-feature"><div class="block">';
        echo $this->Html->image(Configure::read('settings.imageDir').$sizeImage.'/'.$item['Post']['image'], array(
            'url' => array(
                'action' => 'postIndex',
                'slug' => $item['Post']['slug']
            )
        ));
        echo $this->Html->link($item['Post']['name'], array(
            'action' => 'postIndex',
            'slug' => $item['Post']['slug']
        ), array(
            'class' => 'caption'
        ));
        echo '</div></div></div>';
    }
    ?>
</div><!-- end new feature-->
<div class="row">
    <div class="col-md-12">
        <div class="news-home">
            <h3 class="title red">Nội dung nổi bật</h3>
            <?php
            foreach ($newsHomepage as $item) :
            if (!$item['Post']['home']) {
                continue;
            }
            ?>
            <div class="media news">
                <div class="media-body">
                    <h2 href="<?php echo $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>" class="media-heading"><?php echo $item['Post']['name'] ?></h2>
                    <?php if ($item['Post']['image']): ?>
                        <a href="<?php echo $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>">
                            <?php echo $this->Html->image(Configure::read('settings.imageDir').'500/'.$item['Post']['image']); ?>
                        </a>
                        <br>
                    <?php endif; ?>
                    <div class="desription_news"><?php echo $this->Text->truncate(strip_tags($item['Post']['content']), 400) ?></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php endforeach; ?>
        </div><!-- end news home-->
    </div>
</div>