<nav id="main-nav">
    <ul>
        <?php
            foreach ($links as $label => $link) {
                $class = strtoupper($label) == $link_sel ? 'class="sel"' : "";
                echo "<li><a href=\"{$link}\" {$class}>{$label}</a></li>";
            }
        ?>
    </ul>
</nav>
