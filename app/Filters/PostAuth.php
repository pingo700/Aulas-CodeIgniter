<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class PostAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!$this->$request->is('post')) {
            return $this->response->setStatusCode(500)->setBody('Entrada por URL não permitida.');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}