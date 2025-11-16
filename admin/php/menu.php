<div class="menu-container">
    <div class="wrapper">
        <nav>
            <?php

            $links = [
                'ankiety'     => 'Ankiety',
                'publikacje'  => 'Publikacje',
                'zestawienia' => 'Zestawienia'
            ];

            foreach ($links as $key => $label) {
                $class = ($page === $key) ? 'class="link-active"' : '';
                echo "<a href=\"index.php?page=$key\" $class>$label</a>";
            }
            ?>

        </nav>

        <a href="index.php?page=logout" class="logout">
            <?php include "svg/logout.html"; ?>
        </a>
    </div>
</div>