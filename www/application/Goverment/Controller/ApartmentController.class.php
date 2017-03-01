<?php
/**
 * 参    数：
 * 作    者：lht
 * 功    能：OAth2.0协议下第三方登录数据报表
 * 修改日期：2013-12-13
 */
namespace Goverment\Controller;
use Common\Controller\AdminbaseController;
use  Common\Model\PostsModel;
use Common\Model\UsersModel;
class ApartmentController extends AdminbaseController {
	
	//用户列表
	/*function indexs(){
		$this->display();
	}*/
	function indexs(){
		$users_model=D("Common/Users");
		$data=$users_model->getList('id,user_login');
		return $data;
	}
	function getBugget(){
		$where=array();
		$where['post_author']=I('post_author','1');
		$where['post_category']=I('post_category','0');
		$posts_model=D("Common/Posts");
		$count=$posts_model->where($where)->count();
		$page = $this->page($count, 10);
		$lists = $posts_model
			->where($where)
			->order("id DESC")
			->limit($page->firstRow . ',' . $page->listRows)
			->select();
		return $lists;
		/*$this->assign('lists', $lists);
		$this->assign("page", $page->show('Admin'));
		$this->display(":index");*/
	}
	function getFinalAccount(){

	}
	function getApartments(){
		$users_model=D("Common/Users");
		$data=$users_model->getDbFields('id,user_login');
		var_dump($data);
	}
}