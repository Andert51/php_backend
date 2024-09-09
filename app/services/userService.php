<?php
 require_once 'app/repositories/userRepository.php';

 class userService {
    private $userRepository;

    public function __construct(userRepository $userRepository) {
        $this->userRepository = $userRepository;
    }



    public function createUser($data) {
    $user = new User();
    $user->name = $data['name'];
    $user->apasurn = $data['apasurn'];
    $user->amasurn = $data['amasurn'];
    $user->direction = $data['direction'];
    $user->phone = $data['phone'];
    $user->city = $data['city'];
    $user->user = $data['user'];
    $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
    $user->rol = $data['rol'];

    return $this->userRepository->create($user);
    }

}
?>