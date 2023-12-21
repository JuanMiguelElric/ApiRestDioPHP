<?php
class database{

    public function select(int $limit):array
    {
        try{
            //file_get_contents le o arquivo em formato string
            $users = json_decode(file_get_contents(DATABSE_FILE),true);
            $users = array_slice($users,0,$limit);
            return $users;
        }
        catch(Exception $e){
            throw New Exception($e->getMessage());
        }
        return false;
    }

}
?>