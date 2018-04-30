<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Catagories'), ['controller' => 'SubCatagories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub Catagory'), ['controller' => 'SubCatagories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Discounts Types'), ['controller' => 'DiscountsTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Discounts Type'), ['controller' => 'DiscountsTypes', 'action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('List Sizes'), ['controller' => 'Sizes', 'action' => 'index']) ?></li>

        <li><?= $this->Html->link(__('List Product Details'), ['controller' => 'ProductsDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Detail'), ['controller' => 'ProductsDetails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Prices'), ['controller' => 'ProductPrices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Price'), ['controller' => 'ProductPrices', 'action' => 'add']) ?></li>
    </ul>
</nav>