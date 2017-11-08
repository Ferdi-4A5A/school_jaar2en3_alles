<form method="post" action="">
    <input type="text" name="output-text" />
    <button type="submit">Weergeef text</button>
</form>

<?php

    $hobbies = [
        'Hacking',
        'Drinking',
        'Streaking',
        'Doing nothing',
        'Sleeping',
        'LARPing',
        'Stalking',
    ];

    echo '<ul>';
        foreach ($hobbies as $value) {
            echo '<li>' . $value . '</li>';
        }
    echo '</ul>';

    ?>

    <ul>
        <?php foreach ($hobbies as $value) { ?>
            <li> <?php echo $value ?> </li>
        <?php } ?>
    </ul>
