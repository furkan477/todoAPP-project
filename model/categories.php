<?php
   
    if($process == 'add'){

        if(!$data['title']){
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Lütfen kategoriniz için bir başlık giriniz',
            ];
        }
        
        $q = $db->prepare("INSERT INTO categories SET title=?, users_id=?");
        $q->execute([$data['title'], get_session('id')]);

        if($q->rowcount()){
            

            return [
                'success' => true,
                'type' => 'success',
                'message' => 'Kategoriniz başarıyla eklenmiştir.',
                'redirect' => 'tr/categories/list'
            ];

        }else{
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Kategoriniz eklenirken bir hata oluştu.',
            ];
        }

    }
    if($process == 'list'){

        $q = $db->prepare("SELECT * FROM categories WHERE users_id=?");
        $q->execute([get_session('id')]);

        if($q->rowcount()){
            

            return [
                'success' => true,
                'type' => 'success',
                'data' => $q->fetchAll(PDO::FETCH_ASSOC)
            ];

        }else{
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Kategoriniz eklenirken bir hata oluştu.',
            ];
        }

    }
     if($process == 'remove'){

        $q = $db->prepare("DELETE FROM categories WHERE categories.id =? && categories.users_id =?");
        $q->execute([$data['id'],get_session('id')]);

        if($q->rowcount()){
            

            return [
                'success' => true,
                'type' => 'success',
            ];

        }else{
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Silme işleminde bir hata oluştu.',
            ];
        }

    }
    if($process == 'getsingle'){

        $q = $db->prepare("SELECT * FROM categories WHERE categories.id=? && users_id=?");
        $q->execute([$data['id'],get_session('id')]);

        if($q->rowcount()){
            

            return [
                'success' => true,
                'type' => 'success',
                'data' => $q->fetch(PDO::FETCH_ASSOC)
            ];

        }else{
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Kategoriniz eklenirken bir hata oluştu.',
            ];
        }

    }
    if($process == 'edit'){

        if(!$data['title']){
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Lütfen kategoriniz için bir başlık giriniz',
            ];
        }

        $q = $db->prepare("UPDATE categories SET categories.title=? WHERE categories.id=? && users_id=?");
        $edit = $q->execute([$data['title'],$data['id'],get_session('id')]);

        if($edit){
            
            return [
                'success' => true,
                'type' => 'success',
                'message' => 'Kategoriniz Güncellenmiştir.',
                'data' => $q->fetch(PDO::FETCH_ASSOC)
            ];

        }else{
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Kategoriniz güncellenirken bir hata oluştu.',
            ];
        }

    }
?>