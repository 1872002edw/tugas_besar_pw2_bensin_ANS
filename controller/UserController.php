<?php

class UserController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDaoImpl();
    }

    public function index()
    {
        $signInPressed = filter_input(INPUT_POST, 'btnSignIn');
        if ($signInPressed) {
            $username = filter_input(INPUT_POST, "username");
            $password = filter_input(INPUT_POST, 'password');
            $md5Password = md5($password);
            $user = $this->userDao->login($username, $md5Password);
            if ($user != null && $user->getUsername() == $username) {
                $_SESSION['session'] = true;
                $_SESSION['session_id'] = $user->getId();
                $_SESSION['session_nama'] = $user->getNama();
                $_SESSION['session_role'] = $user->getRole();
                $_SESSION['session_pegawai'] = $user->getPegawaiId();
                $_SESSION['session_member'] = $user->getMemberId();

                if ($user->getRole() == 'member') {
                    $poinMasukDao = new PoinMasukDaoImpl();
                    $poinmauhabis = $poinMasukDao->getPoinMauHabis($user->getId());
                    if ($poinmauhabis['poin'] != null) {
                        //insert Kodingan here
                        ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        $from = "ans@gmail.com";
                        $to = $user->getEmail();
                        $subject = "Reminder Kadaluarsa Poin";
                        $message = "Halo " . $user->getNama() . ", poin kamu sebanyak " . $poinmauhabis['poin'] . " memiliki masa berlaku kurang dari 3 hari. Yuk segera tukarkan poinmu!!";
                        $headers = "From:" . $from;
                        mail($to, $subject, $message, $headers);
                        echo "Pesan email sudah terkirim.";
                    }
                }
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo '<div class="bg-error">Invalid username or password</div>';
            }
        }
        include_once 'login.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        echo "<script>window.location.href='index.php'</script>";
    }
}
