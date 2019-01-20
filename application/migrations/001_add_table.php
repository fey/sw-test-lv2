<?php

class Migration_Add_Table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
                        'book_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => true,
                                'auto_increment' => true
                        ),
                        'book_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '128',
                        ),
                        'author_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '128',
                        ),
                        'book_year' => array(
                            'type' => 'year',
                            'constraint' => '4',
                        ),
                ));
        $this->dbforge->add_key('book_id', true);
        $this->dbforge->create_table('books');
    }

    public function down()
    {
        $this->dbforge->drop_table('books');
    }
}
