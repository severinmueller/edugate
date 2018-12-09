<div id="main">
    <div class="inner">
        <header>
            <h1>Dein Portal zur Weiterbildung.</h1>
            <p>Entdecke jetzt das vielfältige Angebot an Weiterbildungskursen von Fachhoschulen in der ganzen Schweiz. Wähle die Kategorie, für die Du dich interessierts:</p>
        </header>


        <section class="tiles">


            <article class="style0">">
									<span class="image">
										<img src="<?php echo base_url('assets/images/pic05.jpg')?>" alt="" />
									</span>
                <a href="<?php echo site_url('/categories/courses/'); ?>">
                    <h2>Alle</h2>
                    <div class="content">
                        <p></p>
                    </div>
                </a>
            </article>
            <?php $style = 1; ?>
    <?php foreach ($categories as $category) : ?>
    <?php if($style<11){
        $style++;
    }else {
            $style = 0;
        }
    ?>
            <article class="<?php echo "style".$style ?>">
									<span class="image">
										<img src="<?php echo base_url('assets/images/pic05.jpg')?>" alt="" />
									</span>
                <a href="<?php echo site_url('/categories/courses/'.$category['id']); ?>">
                <h2><?php echo $category['name']; ?></h2>
                <div class="content">
                    <p></p>
                </div>
                </a>
            </article>
    <?php endforeach; ?>
        </section>
    </div>
</div>
