<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Laravel connection to DB Mysql</title>
</head>
<body>
    <div>
        <?php
            try {
                \DB::connection()->getPDO();
                dump('Database connected: ' . \DB::connection()->getDatabaseName());
            }
             
            catch (\Exception $e) {
                dump('Database connected: ' . 'None');
            }
        ?>
    </div>
</body>
</html>