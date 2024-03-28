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
        $dataId = $this->data->{$this->data->getKeyName()};
    
        return [
            'class'    => 'btn btn-sm btn-success pull-right restore',
            'data-id'  => $dataId,
            'id'       => 'Liberaracesso'.$dataId,
            'onclick'  => 'liberarAcesso(event, ' . $dataId . ')', // Adiciona o evento como argumento
        ];
    }
    

    public function getDefaultRoute()
    {
        
        /*
        
        return route('voyager.'.$this->dataType->slug.'.restore', $this->data->{$this->data->getKeyName()});
*/
        /*
return route('o-papi').'/+'.$this->data->{$this->data->getKeyName()};
*/
       

        return route('o-papi').'/+'.$this->data->{$this->data->getKeyName()};

        
        /*
        return route('o-papi');
        */
    }

     // Adiciona a função teste() à classe LiberarAcesso
     
}


