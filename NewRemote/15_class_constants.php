<?php
final class FAKE_ENUM_DAY
{
    const MONDAY=1;
    const TUESDAY=2;
    const WEDNESDAY=4;
    const THURSDAY=8;
    const FRIDAY=10;
    function printDay(int $day)
    {
        switch ($day)
        {
            case FAKE_ENUM_DAY::MONDAY:
                echo "Monday";
            break;
        }
    }
   
}
?>