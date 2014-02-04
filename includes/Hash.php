<?php
	class Hash
	{
		public function create($data,$salt)
		{
			$context = hash_init("sha256",HASH_HMAC,$salt);
			hash_update($context,$data);
			return hash_final($context);
		}
		public function random()
		{
			$result = base64_encode(mcrypt_create_iv("20", MCRYPT_RAND));
			return $result;
		}
	}
?>


