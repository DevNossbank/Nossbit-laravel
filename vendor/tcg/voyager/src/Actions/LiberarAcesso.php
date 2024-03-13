<?php
/*
namespace TCG\Voyager\Actions;
*/


namespace TCG\Voyager\Actions;

use App\Http\Controllers\LiberarAcessoController;
use Illuminate\Support\Facades\Route; 



class LiberarAcesso extends AbstractAction
{
    public function getTitle()
    {
        
        return __('Liberar acesso');
    }

    public function getIcon()
    {
        return 'voyager-lock';
    }


    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        
        
        return [
            'class'   => 'btn btn-sm btn-success pull-right restore',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'restoree-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        /*
        
        return route('voyager.'.$this->dataType->slug.'.restore', $this->data->{$this->data->getKeyName()});
*/
return route('trades');


        
/*
        return route('enviar-email-teste');
        */
        
    }

     // Adiciona a função teste() à classe LiberarAcesso
     
}
