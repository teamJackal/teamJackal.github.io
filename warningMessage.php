<?php
function getMessage($category, $location, $arrivalTime, $endTime, $customMessage){
    if($category == 'Tsunami'){
        return "TSUNAMI WARNING HAS BEEN ISSUED. ESTIMATED TIME OF ARRIVAL IS IN $arrivalTime HOUR(S)";
    }
    if($category == 'Tornado'){
        $location = strtoupper($location);
        return "TORNADO WARNING HAS BEEN ISSUED IN THE $location AREA. A TORNADO HAS EITHER FORMED OR WILL FORM IMMINENTLY. TAKE SHELTER IMMEDIATELY.";
    }
    if($category == 'Missile'){
        return "A MISSILE LAUNCH HAS BEEN DETECTED AND INBOUND. SEEK IMMEDIATE SHELTER.";
    }
    if($category == 'Wildfire'){
        $location = strtoupper($location);
        return "WILFIRE $location. EVACUATE AREA AND WATCH NEWS OR CALL 211.";
    }
    if($category == 'Flash Flood'){
        $location = strtoupper($location);
        return "FLASH FLOOD WARNING $location UNTIL $endTime. AVOID FLOOD AREAS.";
    }
    if($category == 'Terrorist'){
        $location = strtoupper($location);
        return "Danger in $location. Dangerous person(s) in the area.";
    }
    if($category == 'Amber Alert'){
        return strtoupper($customMessage);
    }
}
?>
