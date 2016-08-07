<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apikey_model extends CU_Model {
	const TABLE_NAME = "apikeys";
	
	public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll() {
		self::$dbConnection->cache_on();		
		$query = self::$dbConnection->get('apikeys');
        return $query->result();
    }

    public function generateKey($data){
        //var_dump($data);
        // /echo $data->user->email;
        //die();
        // echo $data->user->user_id;
        // var_dump($data);
        // echo $data->user->user_id;
        // die();
        $return = self::delete($data->user->user_id);
        // echo $return;

        $insertData = new stdClass();
        $insertData->user_id = $data->user->user_id;
        $insertData->email = $data->user->email;
        $insertData->key = md5($data->user->email);
        //var_dump($insertData);

        self::$dbConnection->insert("apikeys", $insertData);
		
        $data->authCode = $insertData->key;
        unset($data->user);
        // var_dump($data);
        return $data;
    }

    public function delete($user_id){
        // var_dump($user_id);
        // die();
        self::$dbConnection->where('user_id =', $user_id);
        //self::$dbConnection->limit(1);
        self::$dbConnection->delete(self::TABLE_NAME);
        return (self::$dbConnection->affected_rows() > 0) ? 1 : 0;
    }

    public function deleteByAuthCode($authCode){
        // var_dump($user_id);
        // die();
        self::$dbConnection->where('key =', $authCode);
        //self::$dbConnection->limit(1);
        self::$dbConnection->delete(self::TABLE_NAME);
        return (self::$dbConnection->affected_rows() > 0) ? 1 : 0;
    }
}

/* End of file Apikey_model.php */
/* Location: ./application/models/Apikey_model.php */