<!DOCTYPE html>
<html lang="nl" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>update form</title>
    </head>
    <body>
        <form class="" action="" method="post">
            <label for="department_name">department_name</label><br>
            <input type="txt" name="department_name" id="department_name" value="<?php echo $data['department_name']?>"><br><br>

            <label for="location_id">location_id</label><br>
            <input type="number" name="location_id" id="location_id" value="<?php echo $data['location_id']?>"><br><br>

            <label for="manager_id">manager_id</label><br>
            <input type="number" name="manager_id" value="<?php echo $data['manager_id']?>"><br><br>

            <input type="submit" name="submit" value="verstuur">
        </form>

    </body>
</html>
