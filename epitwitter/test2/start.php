<?php
include 'EpiCurl.php';
include 'EpiOAuth.php';
include 'EpiTwitter.php';
include 'secret.php';

try {
$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
print_r($twitterObj);
$url = $twitterObj->getAuthorizationUrl();
echo '<a href="' . $url  . '">Authorize with Twitter</a>';
}  catch (EpiTwitterException $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>

