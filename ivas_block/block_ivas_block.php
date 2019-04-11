<?php


defined('MOODLE_INTERNAL') || die();

class block_ivas_block extends block_base {
    
    public function init() {
        $this->title = get_string('pluginname', 'block_ivas_block');
    }
    
    public function get_content() {
      if ($this->content !== null) {
            return $this->content;
        }
       
        if(!empty($_POST["inputtext"])){
            $data = $_POST["inputtext"];
            $this->save_db_data($data);
        }
        
        $text = $this->get_db_data();        
        $renderer = $this->page->get_renderer('block_ivas_block');
        $this->content =  new stdClass();
        $this->content->text .= $renderer->get_mcontent($text);
      
        return $this->content;
    }
    
    public function get_db_data(){
        $output = 'DB data:';
        
        global $DB;
        $records = $DB->get_records('block_ivas_block');
        
        foreach($records as $r){
            $output.= " ";
            $output.= $r->proba;
        }
        
        return $output;
    }
    
    public function save_db_data($data){
        global $DB;
        $record = new stdClass();
        $record->proba = $data;
        $DB->insert_record('block_ivas_block', $record);
    }
}