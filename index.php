<!doctype html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="style.css" type="test/css" />


</head>
<body>


<div class="Banner"
Personal Drive 
</div>


<a href="/Drive/">test</a>
</br>
<a href="/Drive/pyth.py" download><img src ="./Drive/logo.jpeg" alt="TELECHARGER Ici"</a>
</br>

<?php

$fi = new FilesystemIterator(("./Drive"), FilesystemIterator::SKIP_DOTS);
$count =  iterator_count($fi);
echo "There are $count files";

?>

</body>
</html>
