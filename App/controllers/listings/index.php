<!-- not used code just for reference -->
<?php 

use Framework\Database;

$config = require basePath('config/db.php');
$db = new Database($config);

$listings = $db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

// inspect($listings);

// passing data to view
loadView('/listings/index',['listings'=>$listings]) ?>