<h1>Projects</h1> 
<article>
    <p>Welcome to the projects page! Lah de dah!</p>
</article>

<?php foreach ($languages as $lang => $projects): ?>
    <h2><?php echo $lang; ?></h2>
    <section class="project-group">
        <?php foreach ($projects as $project): ?>
            <article class="project">
                <div class="cover">
                    <a href="<?php echo $project['link']; ?>"><!--
                    --><img src="<?php echo $project['image']; ?>" /><!--
                    --></a>
                </div>
                <a href="<?php echo $project['link']; ?>">
                    <h3><?php echo $project['name']; ?></h3>
                </a>
                <p>
                    <?php echo $project['description']; ?>
                </p>
            </article>
        <?php endforeach; ?>
    </section>
<?php endforeach; ?>
