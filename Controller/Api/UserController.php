<?php
class UserController extends BaseController
{
    public function ListAction()
    {
        $erroDescription ='';// guardar erro
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $stringParamsArray = $this-> getStringParams();
        //validar o metodo
        if (strtoupper($requestMethod) == 'GET'){
            try{
                $userModel = new UserModel();
                //limite de user para retornar
                $intLimit=1;
                if(isset($stringParamsArray['limit'])&& $stringParamsArray['limit']){
                    $intLimit = $stringParamsArray['limit'];
                    $userArray = $userModel->getUsers($intLimit);
                    $responseData =  json_encode($userArray);
                }
            }catch(Error $e){
                $erroDescription = $e->getMessage()."Erro ao retornar";
                $erroHeader = 'HTT/1.1 500 INTERNAL SERVER ERROR';
            }
        }else{
            $erroDescription = "Metodo não suportado";
            $erroHeader = "HTTP/1.1 422 UNPROCESSABLE ENTITY";
        }
        //se não tever erro retorna 
        if(!$erroDescription){
            $this->sendOutput(
                $responseData,
                array('Content-Type:application/json','HTTP/1.1 200 OK')
            );
        }else{
            $this->sendOutput(json_encode(array('error'=>$erroDescription)), array('Content-Type:application/json',$erroHeader));
        }
    }
}
?>