<?php

class block_ivas_block_renderer extends plugin_renderer_base {
    
    public function get_mcontent($text, $action) {
        $content = html_writer::start_tag('form', array('id'=>'ivasblock', 'method'=>'post', 'action'=>$action));
        
        $content .=  html_writer::start_tag('div', array('class'=>'mstyle'));
        
        $content .=  html_writer::start_tag('div');
        $content .= html_writer::empty_tag('input', array('id' => 'inputtext', 'type' => 'text', 'name' => 'inputtext'));
        $content .= html_writer:: tag('button','Submit', array('id' => 'button', 'type' => 'submit'));
        $content .= html_writer::end_tag('div');
       
        $content .= html_writer:: tag('label',$text,array('class'=>'mstyle'));
        $content .= html_writer::end_tag('div');
       
        $content .= html_writer::end_tag('form');
        return $content;
    }
 
}