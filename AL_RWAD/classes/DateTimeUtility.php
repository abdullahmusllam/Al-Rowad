<?php
class DateTimeUtility{

    public function getFormattedDate($dateAsString,$format='F-d-Y'){
        $timestamp=strtotime($dateAsString);
        return date($format,$timestamp);
    }
}
///$sql = "SELECT categoryName , description    FROM categories LIMIT 3 OFFSET 2 ";
//page offset 0   1-(1*6)
//page offset 6   1-(1*6)
//page offset 12   1-(1*6)
//page offset 18   1-(1*6)

?>