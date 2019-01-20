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

    public function exportXml()
    {
        $dom = new DOMDocument;
        $this->load->model('Book_model');
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
        header('Content-Type: text/xml');
        echo $dom->saveXML();
    }
}
