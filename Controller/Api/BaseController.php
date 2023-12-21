<?PHP
class BaseController
{
    //chama um metodo que não exist
    public function __call($name, $arguments)
    {
        $this->sendOutput('',array('HTTP/1.1 404 Not Found'));

        
    }
    protected function getStringParams(): array
    {
        //quebrar a string em um var
        parse_str($_SERVER['QUERY_STRING'],$query);
        return $query;
    }
    protected function sendOutput($data, $httpheaders=array())
    {
        header_remove('Set-Cookie');

        if(is_array($httpheaders)&& count($httpheaders)){
            foreach($httpheaders as $httpheader){
                header($httpheader);
            }
        }
        echo $data;
        exit;
    }
}