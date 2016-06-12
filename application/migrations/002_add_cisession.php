<?php
    // define('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Add_cisession extends CI_Migration{
        public function up(){

            $this->dbforge->add_field(array(
                'session_id'=>array(
                    'type'=>'VARCHAR',
                    'constraint'=>'40',
                    'default'=>'0',
                    'null'=>FALSE,
                ),
                'ip_address'=>array(
                    'type'=>'VARCHAR',
                    'constraint'=>'45',
                    'default'=>'0',
                    'null'=>FALSE,
                ),
                'user_agent'=>array(
                    'type'=>'VARCHAR',
                    'constraint'=>'120',
                    'null'=>FALSE,
                ),
                'last_activity'=>array(
                    'type'=>'INT',
                    'constraint'=>10,
                    'unsigned'=>TRUE,
                    'default'=>0,
                    'null'=>FALSE,
                ),
                'user_data'=>array(
                    'type'=>'TEXT',
                    'null'=>FALSE,
                ),
            ));

            $this->dbforge->add_key('session_id',true);
            $this->dbforge->add_key('last_activity');

            $this->dbforge->create_table('ci_sessions');
        }

        public function down(){
            $this->dbforge->drop_table('ci_sessions');
        }
    }
?>