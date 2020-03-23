<?php 
    $hours = explode('-', $this->get('value'));

    $hour1 = explode(':', $hours[0]);
    $hour2 = explode(':', $hours[1]);

    echo "<p class = 'Card__Hours'>";
        echo "$hour1[0]<sup class='Card__minuts'>$hour1[1]</sup>";
        echo " - ";
        echo "$hour2[0]<sup class='Card__minuts'>$hour2[1]</sup>";
    echo "</p>"
?>
