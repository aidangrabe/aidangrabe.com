<h1>Portfolio</h1>
<p>
    Welcome to the Portfolio page. Below are some of the websites I have
    worked on for companies/organizations.<br />
    If you have any queries about any of these websites, please don't hesitate
    to contact me.
</p>

<?php foreach($projects as $project): ?>
    <article class="portfolio">
        <h2>
            <a href="<?php echo $project['link']; ?>" target="_blank">
                <?php echo $project['title']; ?>
            </a>
        </h2>
        <img src="<?php echo $project['image']; ?>" />
        <p>
            <?php echo $project['description']; ?>
        </p>
    </article>
<?php endforeach; ?>
