<?php if (count($ids)): ?>
    <form action="<?= APPROOT ?>/newTest" method="POST">
        <fieldset class="modify-bus-form">
            <legend>Új vizsgálat felvitele</legend>

            <label for="">Búszjárat azonosító</label>
            <select name="buszID" id="">
                <?php foreach($ids as $id): ?>
                    <option value="<?= $id['id'] ?>"><?=$id['id']?></option>
                <?php endforeach ?>
            </select>

            <label for="">Dátum</label>
            <input type="date" name="datum" required>


            <label for="">Megjegyzes</label>
            <input type="text" name="megjegyzes" required>


            <label for="">Engedélyezve</label>
            <input type="number" name="engedelyezve" min="0" max="1" step="1">

            <input type="submit" value="Submit" class="btn btn-grn">
        </fieldset>
    </form>
<?php else:?>
    Sajnáljuk, nincs buszjárat a rendszerben!
<?php endif ?>
