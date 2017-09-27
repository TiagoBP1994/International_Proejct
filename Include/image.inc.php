<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 26, 2017 10:53:45 AM  
//

error_reporting(E_ALL);

class photo {
    private $caption;
    private $credit;
    private $story;
    private $tags;

    public function getCaption() {
        return $this->caption;
    }
    
    public function setCaption( $caption ) {
        $this->caption = $caption;
    }
    
    public function getCredit() {
    return $this->credit;
    }
    
    public function setCredit( $credit ) {
        $this->credit = $credit;
    }
    
    public function getStory() {
    return $this->story;
    }
    
    public function setStory( $story ) {
        $this->story = $story;
    }
    
    public function getTags() {
    return $this->tags;
    }
    
    public function setTags( $tags ) {
        $this->tags = $tags;
    }

    
    public function __toString() {
        $s = '';
        $s .= sprintf("        <tr><td>%s</td>"
                . "<td>%s</td>"
                . "<td><img src='getImage.php?caption=%s&amp;credit=%s&amp;story=%s&amp;tags=%s' width='320' height='240'/></td>"
                . "<td>%s</td></tr>\n"
                , $this->getCaption()
                , $this->getCredit()
                , $this->getStory()
                , $this->getTags()
                );
        return $s;
    }
}
