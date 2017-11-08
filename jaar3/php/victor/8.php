<form method="post" action="">
    <input type="text" name="output-text" />
    <button type="submit">Weergeef text</button>
</form>

<?php

if ($_POST['output-text']) {
    echo htmlspecialchars($_POST['output-text']);
}


//<strong>vetgedrukt</strong>
//<h1>kopje</h1>
//<blabla>
//<a href="http://github.com">Github</a>
//
//<script> alert(1);</script>
//<script> location.href = "http://github.com"; </script>
//<script> alert("Cookie: " + document.3-cookie);</script>
