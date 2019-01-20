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
        $books = $this->Book_model->loadList();
        $this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($books));
    }
    public function show($id)
    {
        var_dump($id);
    }
    public function new()
    {
        $formData = [
            'author_name' => $this->input->post('author_name'),
            'book_name'   => $this->input->post('book_name'),
            'book_year'   => $this->input->post('book_year')
        ];
        $this->load->library('form_validation');
        $this->form_validation->set_rules([
            [
                'field' => 'author_name',
                'rules' => 'required',
            ],
            [
                'field' => 'book_name',
                'rules' => 'required',
            ],
            [
                'field' => 'book_year',
                'rules' => 'required',
            ],
        ]);
        if ($this->form_validation->run() == false) {
            error_log('fail save', 4);
            // $this->output->set_output();
            $this->output
            ->set_status_header(305);
        } else {
            $this->Book_model->save($formData);
        }
    }

    public function exportXml()
    {
        $dom = new DOMDocument;
        $booksNode = $dom->createElement('books');
        foreach ($this->Book_model->loadList() as $book) {
            $bookNode = $dom->createElement('book');
            $bookNode->appendChild($dom->createElement('id', $book['book_id']));
            $bookNode->appendChild($dom->createElement('name', $book['book_name']));
            $bookNode->appendChild($dom->createElement('author', $book['author_name']));
            $booksNode->appendChild($bookNode);
        }
        $dom->appendChild($booksNode);
        header("Content-disposition: attachment; filename=books.xml");
        header('Content-Type: text/xml, ');
        $this->output->set_output($dom->saveXML());
    }
}
