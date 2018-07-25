<div class="row">
    <?php foreach ($products as $item): ?>
        <div class="col-md-3 col-sm-6">
            <div class="item-product" title="<?php echo $item['Product']['name'] ?>">
                <a href="<?php echo $this->Html->url(array('action' => 'productIndex', 'slug' => $item['Product']['slug'])); ?>">
                    <?php echo $this->Html->image(Configure::read('settings.imageDir').'220/'.$item['Product']['image']); ?>
                    <br>
                    <?php echo $this->Number->currency($item['Product']['price']) ?>
                    <br>
                    <?php echo h($item['Product']['name']) ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
if (!isset($paginator) || $paginator) {
?>
    <div class="clearfix"></div>
    <div class="text-center" style="margin: 20px auto 10px">
        <ul class="pagination pagination-sm" style="margin: auto">
            <?php
            if (isset($category)) {
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'productCategory', 'slug' => $category['ProductCategory']['slug']);
            }
            if (@$allProducts) {
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'allProducts');
            }
            if ($this->request->action == 'search') {
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'search', '?' => array('q' => $key));
            }
            if ($this->request->action == 'getProductByManufacture') {
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'getProductByManufacture', 'id' => $manufactureAction['Manufacture']['id'], 'slug' => seo($manufactureAction['Manufacture']['name']));
            }
            echo $this->Paginator->numbers(Configure::read('settings.paginationOptions'));
            ?>
        </ul>
    </div>
    <br>
<?php
}