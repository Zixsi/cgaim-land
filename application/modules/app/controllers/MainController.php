<?php

use App\services\course\Course;
use App\services\instructor\Instructor;
use App\services\review\Review;
use App\services\workshop\Workshop;

class MainController extends APP_Controller
{
    public function index()
    {
        $data = [
            'courses' => Course::get()->getListPublished(3),
            'workshop' => Workshop::get()->getListPublished(3),
            'instructors' => Instructor::get()->getModel()->getListMap(),
            'reviews' => Review::get()->getModel()->getListByCourse(0),
            'pageDescription' => 'Профессиональные онлайн курсы  - 3D анимация, 3D моделирование, скульптинг, рисование, спецэффекты, композиция, концепт-арт, разработка игр и другие курсы дистанционного обучения. Успей записаться, скоро стартует учебный месяц!',
            'pageKeywords' => 'анимация, клуб аниматоров, аниматоры в россии, фриланс, анимационная студия, уроки по анимации, портфолио, персонаж, тайминг, блокинг, короткометражка, фильм, мульт, перекладка, 2D,3D, animator, animations, дорогов, школа анимации, референс, pixar, scream school, animation, blocking, animation mentor, maya, 3d max, key, character, rig, rigging, blender, setup, timing, movie, tooon, cartoon, anime, reference, short, showreel, demoreel, сообщество по анимации ищу аниматора, вакансии, флеш аниматор, работа аниматорам, фриланс, курсы режиссуры, школа анимации, живопись, рисование, мультфильм, Сериал, Буквальные истории, Авторская анимация, Федор Хитрук,wizartschool, wizart, school, wizart animation, школа компьютерной графики, школа кино индустрия, концепт-арт, иллюстрация, 3D моделирование, 3D скульптинг, курсы Zbrush, курсы 3ds max, курсы maya, cg, gamedev, курсы adobe photoshop'
        ];
        
        $this->load->lview('main/index', $data);
    }

    public function terms()
    {
        $this->load->lview('main/terms', []);
    }

    public function privacyPolicy()
    {
        $this->load->lview('main/privacy_policy', []);
    }

}
