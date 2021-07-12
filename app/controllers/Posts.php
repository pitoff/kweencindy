<?php
    class Posts extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->postModel = $this->model('Post');
        }

        public function all(){
            $allPosts = $this->postModel->allPosts();
            $data = [
                'posts' => $allPosts
            ];
            $this->view('posts/all', $data);
        }

        public function addpost(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'category' => $_POST['category'],
                    'image' => $_FILES['image']['name'],
                    'description' => $_POST['description'],
                    'category_err' => '',
                    'image_err' => '',
                    'description_err' => ''
                ];
                if(empty($data['category'])){
                    $data['category_err'] = 'Please type in make up category';
                }
                if(empty($data['image'])){
                    $data['image_err'] = 'No image is selected';
                }
                if(empty($data['description'])){
                    $data['description_err'] = 'please description must not be empty';
                }
                if(empty($data['category_err']) && empty($data['image_err']) && empty($data['description_err'])){
                    if($this->upload()){
                        if($this->postModel->addPost($data)){
                            redirect('posts/all');
                        }else{
                            die('failed to add post');
                        }
                    }else{
                        flash2('upload_failed', 'your file could not be uploaded, format must be jpg|jpeg and size must be less than 5mb');
                        $this->view('posts/addpost', $data);
                    }
                }else{
                    $this->view('posts/addpost', $data);
                }
            }else{
                $data = [
                    'category' => '',
                    'image' => '',
                    'description' => '',
                    'category_err' => '',
                    'image_err' => '',
                    'description_err' => ''
                ];
                $this->view('posts/addpost', $data);
            }
        }

        protected function upload(){
            // $ext_array = array('jpg', 'jpeg', 'png');
            $file_name = $_FILES['image']['name'];
            $temporary_name = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $max_length = 5000000; 
            $extension = strtolower(substr($file_name, strpos($file_name, '.')+1));	
            $location = '../public/images/';
            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){
                if($size < $max_length){
                    if (move_uploaded_file($temporary_name, $location.$file_name)) {
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function removepost($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($this->postModel->removePost($id)) {
					redirect('posts/all');
				}else{
					die('something went wrong');
				}
			}else{
				$this->view('posts/all');
			}
        }

        public function updatepost($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'id' => $id,
                    'category' => $_POST['category'],
                    'image' => $_FILES['image']['name'],
                    'description' => $_POST['description'],
                    'category_err' => '',
                    'image_err' => '',
                    'description_err' => ''
                ];
                if(empty($data['category'])){
                    $data['category_err'] = 'Please type in make up category';
                }
                if(empty($data['image'])){
                    $data['image_err'] = 'No image is selected';
                }
                if(empty($data['description'])){
                    $data['description_err'] = 'please description must not be empty';
                }
                if(empty($data['category_err']) && empty($data['image_err']) && empty($data['description_err'])){
                    if($this->upload()){
                        if($this->postModel->updatePost($data)){
                            redirect('posts/all');
                        }else{
                            die('failed to update post');
                        }
                    }else{
                        flash2('upload_failed', 'your file could not be uploaded, format must be jpg|jpeg and size must be less than 5mb');
                        $this->view('posts/addpost', $data);
                    }
                }else{
                    $this->view('posts/updatepost/'.$data['id'], $data);
                }
            }else{
                $existingPost = $this->postModel->existingPost($id);
                $data = [
                    'id' => $existingPost->id,
                    'category' => $existingPost->category,
                    'image' => $existingPost->image,
                    'description' => $existingPost->description,
                    'category_err' => '',
                    'image_err' => '',
                    'description_err' => ''
                ];
                $this->view('posts/updatepost', $data);
            }

        }

        public function viewpost($id){
            $existingPost = $this->postModel->existingPost($id);
            $data = [
                'viewPost' => $existingPost
            ];
            $this->view('posts/viewpost', $data);
        }


    }