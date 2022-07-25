<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('email') == null) {
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('email')) {
            if (session()->get('role_id') == 2) {
                return redirect()->to('/dashboard');
            } elseif (session()->get('role_id') == 3) {
                return redirect()->to('/home/diagnosa');                # code...
            } else {
                return redirect()->to('/admin');
            }
        }
    }
}
