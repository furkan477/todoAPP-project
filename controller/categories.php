<?php
    if(!get_session('login') || get_session('login') != true) redirect('login');

    if (route(0) == 'categories' && !route(1)){
        
        view('categories/home');
    }elseif(route(0) == 'categories' && route(1) == 'add'){

        if(isset($_POST['submit'])){
            $_SESSION['title'] = $_POST;
            $title = post('title');

            $return = model('categories',['title' => $title],'add');
            

            if($return['success'] == true){
                if (isset($return['redirect'])){
                    redirect($return['redirect']);
                }
            }else{
                add_session('error',[
                    'message' => $return['message'] ?? '',
                    'type' => $return['type'] ?? ''
                ]);
            }

        }

        view('categories/add');
    }elseif(route(0) == 'categories' && route(1) == 'list'){

        $return = model('categories',[],'list');

        view('categories/list',$return['data']);

    }elseif(route(0) == 'categories' && route(1) == 'edit' && is_numeric(route(2))){

        if(isset($_POST['submit'])){    
            $_SESSION['title'] = $_POST;
            $title = post('title');
            $id = post('id');

            $return = model('categories',['title' => $title,'id' => $id],'edit');
            

            if($return['success'] == true){
                add_session('error',[
                    'message' => $return['message'] ?? '',
                    'type' => $return['type'] ?? ''
                ]);
                if (isset($return['redirect'])){
                    redirect($return['redirect']);
                }
            }else{
                add_session('error',[
                    'message' => $return['message'] ?? '',
                    'type' => $return['type'] ?? ''
                ]);
            }

        }

        $return = model('categories',['id' => route(2)],'getsingle');

        view('categories/edit',$return['data']);
    }elseif(route(0) == 'categories' && route(1) == 'remove' && is_numeric(route(2))){
        
        $return = model('categories',['id' => route(2)],'remove');

        redirect('tr/categories/list');

    }


?>