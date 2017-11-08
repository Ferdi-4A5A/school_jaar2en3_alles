<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" type="text/css" href="/mvc/css/main.css">
    <meta charset="utf-8" />
</head>
<body>

<div class="header">
    <h1>Chania</h1>
</div>

<div class="row">

    <div class="col-3 col-m-3 menu">
        <ul>
            <li>The Flight</li>
            <li>The City</li>
            <li>The Island</li>
            <li>The Food</li>
        </ul>
    </div>

    <div class="col-6 col-m-9">

        <h1>The City</h1>

        <form method="post" action="">
            <p><?php echo $table; ?></p>
        </form>

        <form method="post" action="">
            <input type="text" name="contact_name" placeholder="name"/> <br/>
            <input type="text" name="contact_email" placeholder="email"/> <br/>
            <input type="text" name="contact_address" placeholder="address"/> <br/>
            <input type="text" name="contact_telephone" placeholder="telephone"/> <br/>
            <button type="submit" name="op" value="new">Register</button>
        </form>

    </div>

    <div class="col-3 col-m-12">
        <div class="aside">
            <h2>What?</h2>
            <p>Chania is a city on the island of Crete.</p>
            <h2>Where?</h2>
            <p>Crete is a Greek island in the Mediterranean Sea.</p>
            <h2>How?</h2>
            <p>You can reach Chania airport from all over Europe.</p>
        </div>
    </div>

</div>

<div class="footer">
    <p>Resize the browser window to see how the content respond to the resizing.</p>
</div>

<?php echo $select1; ?>
<?php echo isset($select2) ? $select2 : NULL; ?>
<?php echo isset($select3) ? $select3 : NULL; ?>


</body>
</html>

