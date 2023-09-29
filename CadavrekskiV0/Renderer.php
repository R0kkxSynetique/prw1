<?php
class Renderer{
    public function render($verses){
        foreach ($verses as $verse) {
            echo $verse."\n";
        }
    }
}