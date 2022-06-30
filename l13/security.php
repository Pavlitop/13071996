<?php

require_once __DIR__ . '/helpers/response.php';

session_start();

$isGuest = empty($_SESSION['user']);
if ($isGuest){
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login($login, $password)) {
        redirect('index.php');
    } else {
        require __DIR__ . '/auth.php';
        exit;
    }


}

function login(string $login, string $password): bool
{
    if (empty($login) || empty($password)){
        return false;
    }

//    password_hash('123', PASSWORD_ARGON2ID)
    $users = [
        [
            'login' => 'test@test.com',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$a0xWeGluNlphOXlldi9pSQ$k5nqsZ5cR/pYb5m9ptUFD/vmdkN8OJFaW2oviEjcits',
        ],
        [
            'login' => 'test2@test.com',
            'password' => '$argon2id$v=19$m=65536,t=4,p=1$dHRpU3VqN215UjZ1TW94Tg$0AGB8/REI8WJz39dmZz3w64pPjMwg3T+lpz68O8nWXU',
        ],
    ];
    $filtered = array_filter(
        $users,
        fn (array $user) => ($login === $user['login'])
    );

    if (!$filtered || count($filtered) > 1) {
        return false;
    }

    $user = current($filtered);
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] =$user;
        return true;
    }
    return  false;
}
