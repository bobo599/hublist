<?php
if ((get_cookie('GS_ADMIN_USERNAME') != '')) {
$log_file = GSDATAOTHERPATH . HUBLIST_DIR . 'log.txt';

echo '<h3>log</h3>  &nbsp;&nbsp;';
$lines = explode("\n", file_get_contents($log_file));

foreach ($lines as $line) {
    echo "$line <br/>";
}


echo '<br /><br /><a class="button" href="load.php?id=hublist&hubs_view" > Return </a>';

}