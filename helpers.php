<?php
    function basePath(string $path): string{
        return BASE_PATH . '/' . $path;
    }

    /**
     * Load a view 
     * 
     * @param string $name
     * @return void
     * 
     */

    function loadView($name, $data = []) {
        $viewPath = basePath('App/views/' . $name . '.view.php');
        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            die("View not found: " . $name);
        }
        // require basePath('views/' . $name . '.view.php');
    }

    /**
     * Load a partial 
     * 
     * @param string $name
     * @return void
     * 
     */

    function loadPartial($name) {
        $partialPath = basePath('App/views/Partials/' . $name . '.php');
        if (file_exists($partialPath)) {
            require $partialPath;
        } else {
            die("Partial not found: " . $name);
        }
    }


    function inspect($value){
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    function formatSalary($salary) {
        return '$' . number_format(floatval($salary));
    }
?>