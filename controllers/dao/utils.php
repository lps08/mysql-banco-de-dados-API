<?php

class Utils {
    public static function getPropetiesInsertValues(array $element) {
        $propertiesValues = join(', ', array_keys($element));
        $propertiesParams = join(', ', self::getDotsParams(array_keys($element)));

        return array($propertiesValues, $propertiesParams);
    }

    public static function getPropetiesUpdateValues(array $element) {
        $properties = [];
        for ($i=0; $i < count($element); $i++) {
            if (array_keys($element)[$i] == 'id') continue;
            array_push($properties, array_keys($element)[$i] . " = '" . array_values($element)[$i] . "'");
        }

        return join(', ', $properties);
    }

    private static function getDotsParams(array $element) {
        for ($i=0; $i < count($element); $i++) { 
            $element[$i] = ':' . $element[$i];            
        }
        return $element;
    }
}
?>