<?php

/**
 * Description of ValidationsRules
 *
 * @author Eugenia
 */
class ValidationsRules {

    public static function test_input($data) {
        //Removes whitespace and other predefined characters from both sides of a string
        $data = trim($data);
        //This PHP function returns a string with backslashes in front of each character that needs to be quoted in a database query
        $data = addslashes($data);
        //The htmlspecialchars() function converts some predefined characters to HTML entities.
        //Translates: <script>location.href('http://www.hacked.com')</script> 
        //To:   &lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;
        $data = htmlspecialchars($data);
        return $data;
    }

}
    