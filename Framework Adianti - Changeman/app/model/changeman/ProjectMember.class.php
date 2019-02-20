<?php
/**
 * ProjectMember Active Record
 * @author  <your-name-here>
 */
class ProjectMember extends TRecord
{
    const TABLENAME = 'project_member';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial} 
}
