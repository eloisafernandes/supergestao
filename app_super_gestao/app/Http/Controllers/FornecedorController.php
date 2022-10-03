<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = ['Fornecedor 1'];
        $fornecedoresUnless = [
            0 => [
                'nome' => 'fornecedor 1', 
                'status' => 'N', 
                'cnpj' => '098940',
                'ddd' => '83'
            ],
            1 => [
                'nome' => 'fornecedor 2', 
                'status' => 'N',
                'ddd' => '84'
            ],
            2 => [
                'nome' => 'fornecedor 3',
                'status' => 'N', 
                'cnpj' => '9809',
                'ddd' => '81'
            ]
        ];

        /*      
                Operadores ternários 
            condição ? se verdade : se falso  
        */
        $msg = isset($fornecedoresUnless[1]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo $msg;
        $testeIsset = 'testando o metodo isset';
        return view('app.fornecedor.index', compact('fornecedores', 'fornecedoresUnless', "testeIsset" ));
    }
}
