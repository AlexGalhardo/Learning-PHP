<?php
/**
 * Book Active Record
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class Book extends TRecord
{
    const TABLENAME = 'book';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    private $authors;
    private $subjects;
    private $items;
    private $author;
    private $publisher;
    private $collection;
    
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        
        parent::addAttribute('id');
        parent::addAttribute('title');
        parent::addAttribute('isbn');
        parent::addAttribute('call_number');
        parent::addAttribute('author_id');
        parent::addAttribute('edition');
        parent::addAttribute('volume');
        parent::addAttribute('collection_id');
        parent::addAttribute('classification_id');
        parent::addAttribute('publisher_id');
        parent::addAttribute('publish_place');
        parent::addAttribute('publish_date');
        parent::addAttribute('abstract');
    }
    
    /**
     * Returns the book author name
     */
    function get_author_name()
    {
        if (empty($this->author))
        {
            $this->author = new Author($this->author_id);
        }
        
        return $this->author->name;
    }
    
    /**
     * Returns the book collection description
     */
    function get_collection_description()
    {
        if (empty($this->collection))
        {
            $this->collection = new Collection($this->collection_id);
        }
        
        return $this->collection->description;
    }
    
    /**
     * Returns the book publisher name
     */
    function get_publisher_name()
    {
        if (empty($this->publisher))
        {
            $this->publisher = new Publisher($this->publisher_id);
        }
        
        return $this->publisher->name;
    }
    
    /**
     * Reset aggregates
     */
    public function clearParts()
    {
        $this->authors  = array();
        $this->subjects = array();
        $this->items    = array();
    }
    
    /**
     * Aggregation with Author
     */
    public function addAuthor(Author $author)
    {
        $this->authors[] = $author;
    }
    
    /**
     * Aggregation with Subject
     */
    public function addSubject(Subject $subject)
    {
        $this->subjects[] = $subject;
    }
    
    /**
     * Composition with Item
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }
    
    /**
     * Return Author aggregates
     */
    public function getAuthors()
    {
        return $this->authors;
    }
    
    /**
     * Return Subject aggregates
     */
    public function getSubjects()
    {
        return $this->subjects;
    }
    
    /**
     * Return Items composition
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * Load the object and the aggregates
     */
    public function load($id)
    {
        $book_author_rep  = new TRepository('BookAuthor');
        $book_subject_rep = new TRepository('BookSubject');
        $item_rep         = new TRepository('Item');
        
        $criteria = new TCriteria;
        $criteria->add(new TFilter('book_id', '=', $id));
        
        // load the Author aggregates
        $book_authors = $book_author_rep->load($criteria);
        if ($book_authors)
        {
            foreach ($book_authors as $book_author)
            {
                $author = new Author($book_author-> author_id);
                $this->addAuthor($author);
            }
        }
        
        // load the Subject aggregates
        $book_subjects = $book_subject_rep->load($criteria);
        if ($book_subjects)
        {
            foreach ($book_subjects as $book_subject)
            {
                $subject = new Subject($book_subject-> subject_id);
                $this->addSubject($subject);
            }
        }
        
        // load the Item composition
        $items = $item_rep->load($criteria);
        if ($items)
        {
            foreach ($items as $item)
            {
                $this->addItem($item);
            }
        }
        
        // load the object itself
        return parent::load($id);
    }
    
    /**
     * Stores the book and the aggregates (authors, subjects, items)
     */
    public function store()
    {
        // stores the Book
        parent::store();
        
        // delete the aggregates
        $criteria = new TCriteria;
        $criteria->add(new TFilter('book_id', '=', $this->id));
        
        $repository = new TRepository('BookAuthor');
        $repository->delete($criteria);
        $repository = new TRepository('BookSubject');
        $repository->delete($criteria);
        
        // collect persistent item ids
        if ($this->items)
        {
            foreach ($this->items as $item)
            {
                if ($item->id)
                {
                    $item_ids[] = $item->id;
                }
            }
        }
        
        if (!empty($item_ids))
        {
            // delete all items, except for those that persist
            $criteria->add(new TFilter('id', 'NOT IN', $item_ids));
        }
        
        $repository = new TRepository('Item');
        $repository->delete($criteria);
        
        // store the authors
        if ($this->authors)
        {
            foreach ($this->authors as $author)
            {
                $book_author = new BookAuthor;
                $book_author-> book_id    = $this-> id;
                $book_author-> author_id  = $author-> id;
                $book_author->store();
            }
        }
        
        // store the subjects
        if ($this->subjects)
        {
            foreach ($this->subjects as $subject)
            {
                $book_subject = new BookSubject;
                $book_subject-> book_id     = $this-> id;
                $book_subject-> subject_id  = $subject-> id;
                $book_subject->store();
            }
        }
        
        // store the items
        if ($this->items)
        {
            foreach ($this->items as $item)
            {
                $item-> book_id = $this-> id;
                $item->store();
            }
        }
    }
    
    /**
     * Delete the book and its aggregates
     */
    public function delete($id = NULL)
    {
        $id = isset($id) ? $id : $this->{'id'};
        
        BookAuthor::where('book_id', '=', $id)->delete();
        BookSubject::where('book_id', '=', $id)->delete();
        Item::where('book_id', '=', $id)->delete();
        
        // delete the object itself
        parent::delete($id);
    }
}
