<?php 
    function showErrors($errors, $input) {
        if ($errors->has($input)){
            return '<div class="alert alert-danger" style="color:red;">' . $errors->first($input) . '</div>';
        }
    }

?>



