<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Book_model
 * Модель для работы с книгами
 */
class Book_model extends CI_Model
{
    private $table = 'books';

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * Загрузка списка книг
     */
    public function loadList()
    {
        // todo реализовать получение списка книг из БД
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    public function save($data)
    {
        $this->db->insert($this->table, $data);
    }
}
