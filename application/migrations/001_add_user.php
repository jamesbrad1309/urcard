<?php
// define('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration{
    public function up(){

    $this->dbforge->add_field(array(
        'id'=>array(
            'type'=>'INT',
            'constraint'=>5,
            'unsigned'=>TRUE,
            'auto_increment'=>TRUE,
        ),
        'email'=>array(
            'type'=>'VARCHAR',
            'constraint'=>'100',   
        )
    ));

    $this->dbforge->add_key('id',TRUE);
    $this->dbforge->create_table('user');
    //end create table user

    $this->dbforge->add_field(array(
        'id'=>array(
            'type'=>'INT',
            'constraint'=>5,
            'unsigned'=>TRUE,
        ),
        'email'=>array(
            'type'=>'VARCHAR',
            'constraint'=>'100',
        ),
        'password'=>array(
            'type'=>'VARCHAR',
            'constraint'=>'100',
        ),
        'role_id'=>array(
            'type'=>'INT',
            'unsigned'=>TRUE,
            'constraint'=>5,
        ),
        'create_date'=>array(
            'type'=>'DATETIME'
        ),
        'status'=>array(
            'type'=>'VARCHAR',
            'constraint'=>'100',
            'default'=>'PENDING',
        )
    ));

    $this->dbforge->create_table('user_info');
    //end create table user_info

    $this->dbforge->add_field(array(
        'id'=>array(
            'type'=>'INT',
            'auto_increment'=>TRUE,
            'unsigned'=>TRUE,
            'constraint'=>5,
        ),
        'name'=>array(
            'type'=>'VARCHAR',
            'constraint'=>'100',
        ),
        'create_date'=>array(
            'type'=>'DATETIME',
        )
    ));

    $this->dbforge->add_key('id');
    $this->dbforge->create_table('user_role');
    //end create table user_role

    $this->db->query('ALTER TABLE `user_info` ADD FOREIGN KEY(`id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;');

    $this->db->query('ALTER TABLE `user_info` ADD FOREIGN KEY(`role_id`) REFERENCES `user_role`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down(){
        $this->dbforge->drop_table(array('user','user_info','user_role'));
    }
}//class close

?>