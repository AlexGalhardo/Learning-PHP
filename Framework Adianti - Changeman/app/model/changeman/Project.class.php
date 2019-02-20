<?php
/**
 * Project Active Record
 * @author  <your-name-here>
 */
class Project extends TRecord
{
    const TABLENAME = 'project';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    public static function getUserProjects( SystemUser $user )
    {
        $member_projects = ProjectMember::where('member_id', '=', $user->id)->load();
        if ($member_projects)
        {
            $projects = array();
            foreach ($member_projects as $member_project)
            {
                $project = new Project($member_project->project_id);
                $projects[ $member_project->project_id ] = $project;
            }
            return $projects;
        }
    }
    
    public function getMembersAndManagers()
    {
        $project_members = ProjectMember::where('project_id', '=', $this->id)->load();
        if ($project_members)
        {
            $members = array();
            foreach ($project_members as $project_member)
            {
                TTransaction::open('permission');
                $user = new SystemUser($project_member->member_id);
                // if member or manager
                if ($user->checkInGroup( new SystemGroup(3)) OR $user->checkInGroup( new SystemGroup(4)))
                {
//                    var_dump($user);
                    
                    $members[ $user->id ] = $user;
                }
                TTransaction::close();
            }
            return $members;
        }
    }
    
    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = NULL)
    {
        // delete the related System_groupSystem_program objects
        $id = isset($id) ? $id : $this->id;
        
        ProjectMember::where('project_id', '=', $id)->delete();
        
        // delete the object itself
        parent::delete($id);
    }
}
