<?php
function getMessage($category, $location, $arrivalTime, $endTime, $customMessage){
    if($category == 'Tsunami'){
        return "TSUNAMI WARNING HAS BEEN ISSUED. ESTIMATED TIME OF ARRIVAL IS IN $arrivalTime HOUR(S)";
    }
    if($category == 'Tornado'){
        return "TORNADO WARNING HAS BEEN ISSUED. A TORNADO HAS EITHER FORMED OR WILL FORM IMMINENTLY. TAKE SHELTER IMMEDIATELY.";
    }
    if($category == 'Missile'){
        return "A MISSILE LAUNCH HAS BEEN DETECTED AND INBOUND. SEEK IMMEDIATE SHELTER.";
    }
    if($category == 'Wildfire'){
        return "WILFIRE $location. EVACUATE AREA AND WATCH NEWS OR CALL 211.";
    }
    if($category == 'Flash Flood'){
        return "FLASH FLOOD WARNING $location UNTIL $ENDTIME. AVOID FLOOD AREAS."
    }
    if($category == 'Terrorist'){
        return "Danger in $location. Dangerous person(s) in the area."
    }
    if($category == 'Amber Alert'){
        return $customMessage;
    }
}
?>