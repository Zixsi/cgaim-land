<?php

use App\services\apps\Apps;
use App\services\block\Block;
use App\services\bonus\Bonus;
use App\services\course\Course;
use App\services\course\entity\CourseEntity;
use App\services\instructor\Instructor;
use App\services\skill\Skill;

class CourseController extends APP_Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'items' => Course::get()->getModel()->getList()
        ];
                
        $this->load->lview('course/index', $data);
    }
    
    /**
     * @return void
     */
    public function add()
    {
        $item = CourseEntity::create();
        
        $data = [
            'error' => null,
            'instructors' => Instructor::get()->getModel()->getListForSelect(),
            'packages' => $item->getPackagesMap(),
            'skills' => Skill::get()->getModel()->getList(),
            'apps' => Apps::get()->getModel()->getListMap(),
            'bonuses' => Bonus::get()->getModel()->getListMap(),
            'blocks' => Block::get()->getModel()->getListMap()
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Course::get()->save($item)) {
                redirect('/admin/course/');
            } else {
                $data['error'] = Course::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
                
        $this->load->lview('course/item', $data);
    }
    
    /**
     * @param int $id
     */
    public function edit($id)
    {
        $item = Course::get()->getRepository()->getItem($id);
        
        if (empty($item)) {
            redirect('/admin/course/');
        }
        
        $data = [
            'error' => null,
            'instructors' => Instructor::get()->getModel()->getListForSelect(),
            'packages' => $item->getPackagesMap(),
            'skills' => Skill::get()->getModel()->getList(),
            'apps' => Apps::get()->getModel()->getListMap(),
            'bonuses' => Bonus::get()->getModel()->getListMap(),
            'blocks' => Block::get()->getModel()->getListMap()
        ];
        
        if ($this->input->post()) {
            $item->fill($this->input->post());
            
            if (Course::get()->save($item)) {
                redirect(sprintf('/admin/course/edit/%s', $item->id));
            } else {
                $data['error'] = Course::get()->getLastError();
            }
        }
        
        $data['item'] = $item->toArray();
        
//        debug($data['item']); die();
        $this->load->lview('course/item', $data);
    }
    
    /**
     * @param int $id
     * @param int $status
     */
    public function publish($id, $status)
    {
        Course::get()->getModel()->update($id, ['published' => (((int) $status === 1)?1:0)]);
        redirect('/admin/course/');
    }
}
