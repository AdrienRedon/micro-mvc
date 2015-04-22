<?php 
class App{
    function __call($method,$action){
        $this->{$method.$action[0]} = $action[1];
        return $this;
    }

    function run(){
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