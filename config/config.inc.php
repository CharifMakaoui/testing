<?php

$facebookPageId = "787868041271245";

$facebook_app_id = "752045868314737";
$facebook_app_secret = "6ed2307bf22b1c6fe85304ca7219454e";

$tokenPage = "EAAKrZB1LV8HEBAGg5i97ewIKPGUs3ZAYHI6Xm2KfRf8i6oavFPk636mTvL6XvCrUxvaS4kvVS299GmTB1IHBFqZCZCYxOZCbMdVLRnHGUrkuC5ezaOxZBsntHdm8LDsm9ieyBsQ2Gm9VZCXrKL3YnkUMlJZBLP5hUAd0rNRGfxuzH0CleClrKzkr";

$tempVideoFolder = 'tempVideos/';




function deleteDirectory($dir) {
	system('rm -rf ' . escapeshellarg($dir), $retval);
	return $retval == 0; // UNIX commands return zero on success
}