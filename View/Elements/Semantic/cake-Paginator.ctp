<?php $current = $this->Paginator->counter(array('format' => '%page% ')); $Next = $current + 1; $Prev = $current - 1; ?>
<?php $numbers = $this->Paginator->numbers(array('separator' => ''));?>

<?php if($numbers): ?>
    <div class="ui right floated pagination menu">

    <?php if($this->Paginator->hasPrev()) : ?>
            <?php echo $this->Paginator->link('<i class="left chevron icon"></i>', array("page" => $Prev), array('class'=>'item','escape' => false)); ?>
    <?php endif;?>

    <?php $numbers = preg_replace('/<span class="current">(\d+)<\/span>/', '<a class="item"><strong>$1</strong></a>', $numbers); ?>
    <?php echo str_replace('a href','a class="item" href',$numbers); ?>


    <?php if($this->Paginator->hasNext()) : ?>
            <?php echo $this->Paginator->link('<i class="right chevron icon"></i>', array("page" => $Next), array('class'=>'item','escape' => false)); ?>
    <?php endif;?>

</div>
<?php endif; ?>
