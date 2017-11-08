<?php include 'header.php' ?>

<div class="container">
    <div class="col-md-4">

        <form class='form-melden' method="post" action="">

            <select>
                <option value="volvo">Onderwerp</option>
                <option value="saab">Doet niet meer</option>
                <option value="mercedes">Loopt vast</option>
                <option value="audi">Geen verbinding</option>
            </select>

            <br />
            <br />

            <input type="text" name="titel" placeholder="Titel" />

            <br />
            <br />

            <select>
                <option value="volvo">Configuratie</option>
                <option value="saab">Desktop</option>
                <option value="mercedes">Laptop</option>
                <option value="audi">Mobile</option>
            </select>

            <br />
            <br />

            <textarea rows="15" cols="50"></textarea>

            <br />
            <br />

            <button type="submit" name="submit">Verzenden</button>

        </form>

    </div>

    <div class="col-md-8">
        <img src="img/mooi_plaatje.png" alt="mooi_plaatje" class="mooi-plaatje">
    </div>
</div>