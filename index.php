<?php 

class App {

    /**
     * Register route with HTTP method (get, post, put, patch, delete)
     * 
     * @param  string $method Name of the HTTP method
     * @param         $action URL and Callback
     * @return App    $this   
     */
    function __call($method, $action) {
        $this->{$method.$action[0]} = $action[1];
        return $this;
    }

    /**
     * Execute action based on the user request
     * 
     * @return Execution of the registred Callback
     */
    function run() {
        foreach($this as $request => $action)
            if(preg_match("@$request@i", "$_SERVER[REQUEST_METHOD]$_SERVER[REQUEST_URI]", $p))
                return $action($this, $p);
    }
}

(new App)
->get('/home', function() {
    echo '<h1>home</h1>';
})
->run();
