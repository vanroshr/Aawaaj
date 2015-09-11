<?php require_once(ROOT_PATH."database/session.php");?> 
<?php include_once(ROOT_PATH."profile/system/models/profile.class.php");?>
<?php include_once(ROOT_PATH."profile/system/models/project.class.php"); ?>
<?php include_once(ROOT_PATH."profile/system/repositories/projectrepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/profilerepository.class.php");?>

<?php

class ProjectController{

	private $profile_repository;
	public function __construct(){
		$this->profile_repository = new ProfileRepository();
	}
	
	public function index($u_id){
		$result = $this->profile_repository->get_by_id($u_id);
		if($result == NULL){
			//if id=jpt
			$this->error_page();
			exit();
		}

		if(!$result->get_user_status()){
			//user status not active yet
			$this->error_page();
			exit();
		}
		else{
			$data = array('profile_photo'=>$result->get_profile_photo(),'about'=>$result->get_about(),'user_id'=>$result->get_user_id(),'user_name'=>$result->get_user_name(),'first_name'=>$result->get_first_name(),'last_name'=>$result->get_last_name(),'contact_number'=>$result->get_contact_number(),'user_type'=>$result->get_user_type());
			if($result->get_user_type() == "generalUser"){
				$data['age']=$result->get_age();
			}
			else{
				$data['name']=$result->get_name();
				$data['doe']=$result->get_doe();
				$data['img']=$result->get_img();
				$data['address']=$result->get_address();
				$data['objective']=$result->get_objective();
			}

			if($result->get_user_type() == "welfare"){
				$data['service']=$result->get_service();
			}
		}
		if($data['user_type'] != "organization"){
			$this->error_page();
			exit();
		}
		echo "View Project by this user here";
	}

	public function add(){
		include_once(ROOT_PATH.'profile/views/container.php');
	}

	public function save(){
		// yo thau ma project save huna aaucha
		// yei bata feri "index.php" ma falne jun chai profile ma jancha
	}

	public function selectProject(){
		echo "particular project view page";
	}

	public function error_page(){
		echo "Include Error_Page here. Error_Page may be common to all";
	}

}


$project_controller = new ProjectController();

if(isset($_GET['id'])){
	$user_profile_id = $_GET['id'];
	$user = NULL;
	if(isset($_SESSION['user_hash'])){
		$user = $_SESSION['user_hash'];
	}

	switch ($user_profile_id) {
		case $user:
			if($_SESSION['user_type'] == "organization"){
				if(isset($_GET['m'])){
					$method = $_GET['m'];
					
					switch ($method) {
						case 'add':
							$project_controller->add();
							break;
						
						default:
							$project_controller->error_page();
							break;
					}
				}
				else{
					$project_controller->index($user_profile_id);	
				}
				if(isset($_POST['submit'])){
					$project_controller->save();
				}
			}
			else{
				$project_controller->error_page();
			}
		break;
	
		default:
		if(isset($_GET['m'])){
			$project_controller->error_page();
			exit();
		}

		$project_controller->index($user_profile_id);
		break;
	}

	if(isset($_GET['p_id'])){
		$p_id = $_GET['p_id'];
		$project_controller->selectProject($user_profile_id,$p_id);
	}


}
else{
	$project_controller->error_page();
}