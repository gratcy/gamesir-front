<?php
$xml_string = file_get_contents('https://www.youtube.com/feeds/videos.xml?channel_id=UCZhblvtYPVNoxR6APnRpbCA');
$xml = simplexml_load_string($xml_string);
file_put_contents(dirname(__FILE__) . '/../application/tmp/youtube.json', json_encode($xml));
