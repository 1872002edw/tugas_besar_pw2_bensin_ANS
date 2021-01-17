<?php

class SignUpController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDaoImpl();
    }

    public function index()
    {
        $submitPressed = filter_input(INPUT_POST, "btnSubmit");
        if ($submitPressed) {
            //get Data dari form
            $name = filter_input(INPUT_POST, "name");
            $email = filter_input(INPUT_POST, "email");
            $username = filter_input(INPUT_POST, "username");
            $password = filter_input(INPUT_POST, "password");
            $repassword = filter_input(INPUT_POST, "repassword");
            $birthday = filter_input(INPUT_POST, "birthday");

            $tglLahir = date('Y/m/d', strtotime($birthday));

            $md5Password = md5($password);

            $cekSama = $this->userDao->cekUsernameEmail($username, $email);

        

            if ($password != $repassword) {
                echo '<div class="bg-error">Password dan retype password tidak sama</div>';
            } else if ($cekSama != null) {
                if ($cekSama->getUsername() != null) {
                    echo '<div class="bg-error">Username sudah terpakai</div>';
                }
                if ($cekSama->getEmail() != null) {
                    echo '<div class="bg-error">Alamat email sudah terpakai</div>';
                }
            } else {
                //buat object User
                $user = new User();
                $user->setNama($name);
                $user->setEmail($email);
                $user->setUsername($username);
                $user->setPassword($md5Password);
                $user->setRole('member');

                $member = new Member();
                $member->setTgllahir($tglLahir);


                $resultSignUp = $this->userDao->signUp($user, $member);
                if ($resultSignUp) {
                    echo '<div class="bg-success">Pendaftaran berhasil</div>';
                    echo "<script>window.location.href='index.php'</script>";
                } else {
                    echo '<div class="bg-error">Pendaftaran gagal</div>';
                }
            }
        }

        include_once 'signup.php';
    }
}
