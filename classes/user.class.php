<?php
	class User {
		protected $Conn;
		public function __construct($Conn){
			$this->Conn = $Conn;
		}
		public function createUser($user_data){
			$sec_password = password_hash($user_data['password'], PASSWORD_DEFAULT);
			$query = "INSERT INTO user (first_name, surname, email, password, phone, address_line_1, address_line_2, address_line_3, postcode)
			VALUES (:first_name, :surname, :email, :password, :phone, :address_line_1, :address_line_2, :address_line_3, :postcode)";
			$stmt = $this->Conn->prepare($query);
			return $stmt->execute(array(
				'first_name' => $user_data['first_name'],
				'surname' => $user_data['surname'],
				'email' => $user_data['email'],
				'password' => $sec_password,
				'phone' => $user_data['phone'],
				'address_line_1' => $user_data['address_line_1'],
				'address_line_2' => $user_data['address_line_2'],
				'address_line_3' => $user_data['address_line_3'],
				'postcode' => $user_data['postcode']
			));
		}

		private function getPasswordAttempts($user_email) {
			$query = "SELECT password_attempts FROM user WHERE email = :email";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array(
				'email' => $user_email
			));
			return $stmt->fetch();
		}

		private function setPasswordAttempts($user_email, $reset = false) {
			if ($reset) {
				$query = "UPDATE user SET password_attempts = 0 WHERE email = :email";
			} else {
				$query = "UPDATE user SET password_attempts = password_attempts + 1 WHERE email = :email";
			}
			$stmt = $this->Conn->prepare($query);
			return $stmt->execute(array(
				'email' => $user_email
			));
		}

		private function getUserLocked($user_email) {
			$query = "SELECT locked FROM user WHERE email = :email";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array(
				'email' => $user_email
			));
			return $stmt->fetch();
		}

		private function setUserLocked($user_email, $locked) {
			$query = "UPDATE user SET locked = :locked WHERE email = :email";
			$stmt = $this->Conn->prepare($query);
			return $stmt->execute(array(
				'locked' => $locked,
				'email' => $user_email
			));
		}

		public function loginUser($user_data) {
			$password_attempts = $this->getPasswordAttempts($user_data['email'])['password_attempts'];
			if ($password_attempts >= 5) {
				$this->setUserLocked($user_data['email'], true);
			}
			$isLocked = $this->getUserLocked($user_data['email'])['locked'];

			$query = "SELECT * FROM user WHERE email = :email";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array('email' => $user_data['email']));
			$attempt = $stmt->fetch();

			if ($attempt && password_verify($user_data['password'], $attempt['password']) && !$isLocked) {
				$this->setPasswordAttempts($user_data['email'], true);
				return $attempt;
			} else {
				$this->setPasswordAttempts($user_data['email']);
				return false;
			}
		}

		public function getUser() {
			$query = "SELECT * FROM user WHERE user_id = :user_id";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array(
				'user_id' => $_SESSION['user_data']['user_id']
			));
			return $stmt->fetch();
		}

		public function updateUserProfile($file_name) {
			$query = "UPDATE user SET image = :image WHERE user_id = :user_id";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array(
				'image' => $file_name,
				'user_id' => $_SESSION['user_data']['user_id']
			));
			return true;
		}
	}