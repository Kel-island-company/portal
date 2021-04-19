<?php


	class Mail{

		public $opt,$mailer;
		public $email = 'contato@portfoliokevinfreire.com';//Trocar e-mail aqui!
		public $senha = '1245K&vin';//Trocar senha aqui!

		public function __construct(Array $parametros){
			include('classes/phpmailer/PHPMailerAutoload.php');
			$this->mailer = new PHPMailer();

			$this->mailer->IsSMTP();
			$this->mailer->Host = 'portal.portfoliokevinfreire.com'; //SERVIDOR SMTP DA HOSPEDAGEM
			$this->mailer->Port = 465; //PORTA DO SMTP
			$this->mailer->SMTPDebug = 0;
			$this->mailer->SMTPAuth = true;
			$this->mailer->SMTPSecure = 'tls';
			$this->mailer->Username = $this->email;
			$this->mailer->Password = $this->senha;

			$this->mailer->IsHTML(true);
			$this->mailer->SingleTo = true;


			$this->mailer->From = $this->email;
			$this->mailer->FromName = $this->email;

			$this->mailer->Subject = 'Mensagem do portal de noticias!';

			$this->addAdress($this->email,'Administrador');

			$body = '';
			foreach ($parametros as $key => $value) {
				$body.=ucfirst($key).": ".$value;
				$body.="<hr>";
			}
	
			$this->mailer->Body = $body;
		}

		public function addAdress($mail,$nome){
			$this->mailer->addAddress($mail,$nome);
			return $this;
		}

		public function sendMail(){
			$this->mailer->CharSet = "utf-8";
			if($this->mailer->send()){
				return true;
			}else{
				return false;
			}
		}


	}

?>