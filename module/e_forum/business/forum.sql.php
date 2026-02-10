<?php
$sql['get_user_name'] = "
select tusrProfil as USERNAME
from t_user
where tusrNama = '%s'
";
?>