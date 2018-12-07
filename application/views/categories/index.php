<ul class="list-group">

    <?php $style = 0; ?>
    <?php foreach ($categories as $category) : ?>
    <?php if($style<11){
        $style++;
    }else {
            $style = 0;
        }
    ?>
        <li class="list-group-item"><a href="<?php echo site_url('/categories/courses/'.$category['id']); ?>"><?php echo $category['name']; ?></a></li>
   <?php echo "style".$style ?>
    <?php endforeach; ?>
</ul>