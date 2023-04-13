<?php
   
    if($process == 'login'){

        if(!$data['email']){
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Lütfen e-posta alanını doldurunuz',
            ];
        }
        if(!$data['passwords']){
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Lütfen şifre alanını doldurunuz',
            ];
        }
        
        $q = $db->prepare('SELECT *, CONCAT(names," ",surname) as fullname FROM users WHERE email=? && passwords=?');
        $q->execute([$data['email'],md5($data['passwords'])]);

        if($q->rowcount()){
            
            $user = $q->fetch(PDO::FETCH_ASSOC);
            
            add_session('id',$user['id']);
            add_session('names',$user['names']);
            add_session('surname',$user['surname']);
            add_session('email',$user['email']);
            add_session('fullname',$user['fullname']);
            add_session('login',true);

            return [
                'success' => true,
                'type' => 'success',
                'message' => 'Giriş Başarılı',
                'data' => $user,
                'redirect' => 'home'
            ];

        }else{
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Kullanıcı Adı veya Şifreniz Hatalı',
            ];
        }

    }
?>
