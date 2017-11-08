    <?php include 'head.php' ?>
<?php include 'header.php' ?>
<form class="col-12 center" name="contact_form" action="form.php" method="post" id="usrform">
  <div class="textdeco">Contact?</div><br><br><br>

  <div class="formtext">Naam:</div>
    <input class="forminput" type="text" name="name"><br><br><br>

  <div class="formtext">Email:</div>
    <input class="forminput" type="text" name="email"><br><br><br>

  <div class="formtext">Bericht:</div>
    <textarea class="forminput" name="message"></textarea><br><br><br>

    <input class="btn btn-blue" type="submit">
</form>
<?php include 'footer.php' ?>
