<h1>Projects</h1> 
<article>
    <p>
        Listed below are some of the projects I have been working on
        over the past few years. These may include both College and personal
        projects, divided up by language.
    </p>
    <p>
        Languages:
        <ul class="project-languages">
            <?php foreach ($languages as $lang => $p): ?>
            <li><a href="#<?php echo $lang; ?>"><?php echo $lang; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </p>
</article>

<?php foreach ($languages as $lang => $projects): ?>
    <h2 id="<?php echo $lang; ?>"><?php echo $lang; ?></h2>
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
                    <?php echo $project->getDescription(130); ?>
                </p>
            </article>
        <?php endforeach; ?>
    </section>
<?php endforeach; ?>
