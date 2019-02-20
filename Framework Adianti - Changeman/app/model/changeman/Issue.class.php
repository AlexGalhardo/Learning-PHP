<?php
/**
 * Issue Active Record
 * @author  <your-name-here>
 */
class Issue extends TRecord
{
    const TABLENAME = 'issue';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial} 
    
    use SystemChangeLogTrait;
    
    /**
     * Return status description
     */
    public function get_status_name()
    {
        $obj = new Status($this-> id_status);
        return _t($obj-> description);
    }
    
    /**
     * Return status description
     */
    public function get_status_color()
    {
        $obj = new Status($this-> id_status);
        return $obj-> color;
    }
    
    /**
     * Return project description
     */
    public function get_project_name()
    {
        $obj = new Project($this-> id_project);
        return $obj-> description;
    }
    
    /**
     * Return category description
     */
    public function get_category_name()
    {
        $obj = new Category($this-> id_category);
        return _t($obj-> description);
    }
    
    /**
     * Return member
     */
    public function get_member_name()
    {
        TTransaction::open('permission');
        $obj = new SystemUser($this-> id_member);
        TTransaction::close();
        return $obj->name;
    }
    
    /**
     * Return user
     */
    public function get_user_name()
    {
        TTransaction::open('permission');
        $obj = new SystemUser($this-> id_user);
        TTransaction::close();
        return $obj->name;
    }
    
    /**
     * Return priority description
     */
    public function get_priority_name()
    {
        $obj = new Priority($this-> id_priority);
        return _t($obj-> description);
    }
    
    /**
     * Return the issue notes
     */
    public function get_notes()
    {
        $repos = new TRepository('Note');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id_issue', '=', $this-> id));
        return $repos->load($criteria);
    }
    
    /**
     * Delete an Active Record object from the database
     * @param [$id]     The Object ID
     * @exception       Exception if there's no active transaction opened
     */
    public function delete($id = NULL)
    {
        $id = isset($id) ? $id : $this->{'id'};
        
        $note_rep = new TRepository('Note');
        
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id_issue', '=', $id));
        
        $note_rep->delete($criteria);
        
        // delete the object itself
        parent::delete($id);
    }
}
