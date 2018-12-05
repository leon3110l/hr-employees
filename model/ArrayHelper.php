<?php
/**
 * a class with array methods
 * 
 * @category   Helper
 * @author     Leon in 't Veld <leon3110l@gmail.com>
 */

class ArrayHelper {
    
    /**
     * checks if something is an associative array
     *
     * @param array $array the array you want to check
     * @return boolean if its assoc or not
     */
    public static function is_assoc(array $array) {
        // Keys of the array
        $keys = array_keys($array);

        // If the array keys of the keys match the keys, then the array must
        // not be associative (e.g. the keys array looked like {0:0, 1:1...}).
        return array_keys($keys) !== $keys;
    }

    /**
     * converts an object and an array to an 2 dimensional array
     *
     * @param mixed $array the array or object
     * @return array the 2d array
     */
    public static function to2DArray($array) {
        if(is_object($array)) {
            $array = (array) $array;
        }

        if(isset($array[0]) && is_object($array[0])) {
            foreach ($array as $key => $value) {
                $array[$key] = (array) $value;
            }
        }
        
        if(static::is_assoc($array)) {
            $array = [$array];
        }
                
        if(!is_array($array)) {
            throw new Exception("variable is not an array/object");
        }

        return $array;
    }

    /**
     * get a couple of items in priority.
     * if null it will pick the next in the priority list
     *
     * @param array $array the array that you want a couple of items from
     * @param array $priority the array with priority keys
     * @param integer (optional) $amount the amount of items you want to get(limits the amount of items you get back)
     * @return array the items
     */
    public static function getPriority(array $array, array $priority, int $amount = 0) {
        $output = [];

        foreach ($priority as $priority_item) {
            if(isset($array[$priority_item]) && !empty($array[$priority_item])) {
                $output[$priority_item] = $array[$priority_item];
            }


            if($amount != 0 && sizeof($output) == $amount) {
                break;
            }
        }

        return $output;
    }

}