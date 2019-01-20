<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Book
 * Контроллер для работы с книгами
 */
class Book extends CI_Controller
{
    /**
     * Загрузка списка книг
     */
    public function index()
    {
        $this->load->model('Book_model');
        echo json_encode($this->Book_model->loadList());
    }
    public function show($id)
    {
        $this->load->model('Book_model');
        // $this->Book_model->
        var_dump($id);
    }
    public function new()
    {
        $this->load->model('Book_model');
        $formData = [
            'author_name' => $this->input->post('author_name'),
            'book_name'   => $this->input->post('book_name'),
            'book_year'   => $this->input->post('book_year')
        ];
        $this->Book_model->save($formData);
    }
}
