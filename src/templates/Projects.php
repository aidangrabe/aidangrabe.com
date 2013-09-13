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
                    <a href="<?php echo $project->getLink(); ?>"><!--
                    --><img src="<?php echo $project->getImage(); ?>" /><!--
                    --></a>
                </div>
                <a href="<?php echo $project->getLink(); ?>">
                    <h3><?php echo $project->getName(); ?></h3>
                </a>
                <p>
                    <?php echo $project->getDescription(); ?>
                </p>
            </article>
        <?php endforeach; ?>
    </section>
<?php endforeach; ?>
