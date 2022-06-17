<?php
class badgeOrder{
    private $index, $filename, $type, $size, $qty;

    public function getIndex(){
        return $this->index;
    }
    public function getFilename(){
        return $this->filename;
    }
    public function getType(){
        return $this->type;
    }
    public function getSize(){
        return $this->size;
    }
    public function getQty(){
        return $this->qty;
    }

    public function setIndex($index){
        $this->index = $index;
    }
    public function setFilename($filename){
        $this->filename = $filename;
    }
    public function setType($type){
        $this->type = $type;
    }
    public function setSize($size){
        $this->size = $size;
    }
    public function setQty($qty){
        $this->qty = $qty;
    }
}

class stickerOrder{
    private $labels, $type, $size, $color, $index;

    public function getIndex(){
        return $this->index;
    }
    public function getLabels(){
        return $this->labels;
    }
    public function getType(){
        return $this->type;
    }
    public function getSize(){
        return $this->size;
    }
    public function getColor(){
        return $this->color;
    }

    public function setIndex($index){
        $this->index = $index;
    }
    public function setLabels($labels){
        $this->labels = $labels;
    }
    public function setType($type){
        $this->type = $type;
    }
    public function setSize($size){
        $this->size = $size;
    }
    public function setColor($color){
        $this->color = $color;
    }
}