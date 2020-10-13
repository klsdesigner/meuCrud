<?php

/**
 * Agenda.class [ MODEL ]
 * Classe responsagem por realizar a manutenção de usuários do sistema
 * @copyright (c) 2020, Kleber de Souza KLSDESIGNER
 */
class Agenda
{

    private $Data;
    private $Agenda_id;
    private $Erro;
    private $Result;

    //Nome da tabela no banco de dados.
    const Tabela = "agenda";

    /**
     * Metodo inicial, responsavel por executar os dados para ramal iax   
     */
    public function ExeCreate(array $data)
    {
        $this->Data = $data;
        
        $this->setData();
        $this->setNome();
        if (!$this->Result) :
            $this->Result = TRUE;
            $this->Erro = array("Opa, você tentou cadastrar uma Agenda que já esta cadastrado no sitema!", KL_ALERT);
        else :
            $this->Create();            
        endif;
    }

    /**
     * Metodo responsagem por realizar alterações no ramal iax     
     */
    public function ExeUpdate($agenda_id, $data)
    {
        $this->Agenda_id = (int) $agenda_id;
        $this->Data = $data;

        $this->setData();
        $this->Update();
    }

    /** Class resposavel por apagar ramal iax */
    public function ExeDelete($agenda_id)
    {
        $this->Agenda_id = (int) $agenda_id;

        $read = new Read;
        $read->ExeRead(self::Tabela, "WHERE id = :id", "id={$this->Agenda_id}");
        
        if (!$read->getResult()) :
            $this->Result = false;
            $this->Erro = array("Erro, você tentou remover uma Agenda que não existe no sistema!", KL_INFOR);
        else :
            $this->Delete();            
        endif;
    }

    /** Retorna o resultado  */
    public function getResult()
    {
        return $this->Result;
    }

    /** Retorna o erro  */
    public function getErro()
    {
        return $this->Erro;
    }

    /**
     * ****************************************
     * *********** PRIVATE METHODS ************
     * ****************************************
     */

    /** Prepara os dados create */
    private function setData()
    {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
        
    }

    /** Verifica a existencia de alguma duplicação. */
    private function setNome()
    {
        $Where = (!empty($this->Agenda_id) ? "agenda_id != {$this->Agenda_id} AND" : '');

        $readName = new Read;
        $readName->ExeRead(self::Tabela, "WHERE {$Where} name = :a", "a={$this->Data['name']}");

        
        if ($readName->getResult()) :
            $this->Result = FALSE;
        else :
            $this->Result = TRUE;
        endif;
    }

    /** Execulta a criação dos dados */
    private function Create()
    {
        
        $create = new Create;
        $create->ExeCreate(self::Tabela, $this->Data);

        if ($create->getResult()) :
            $this->Result = $create->getResult();
            $this->Erro = array("<b>Sucesso:</b> A Agenda {$this->Data['agenda_nome']} foi cadastrado no sietema!", KL_ACCEPT);
        endif;
    }

    /** Execulta a alteração dos dados */
    private function Update()
    {
        $update = new Update;
        $update->ExeUpdate(self::Tabela, $this->Data, "WHERE id = :id", "id=$this->Agenda_id");

        if ($update->getResult()) :
            $this->Result = $update->getResult();
            $this->Erro = array("<b>Sucesso:</b> A contato {$this->Data['name']} foi alterado no sietema!", KL_ACCEPT);
        endif;
    }

    /** Execulta a exclusão dos dados */
    private function Delete()
    {
        $deletar = new Delete();
        $deletar->ExeDelete(self::Tabela, "WHERE id = :id", "id={$this->Agenda_id}");

        if ($deletar->getResult()) :
            $this->Result = true;
            $this->Erro = array("Sucesso, Agenda foi excluido do sistema!", KL_ACCEPT);
        else :
            $this->Result = false;
            $this->Erro = array("Erro, Não foi possivel excluir a Agenda do sistema!", KL_ERROR);
        endif;
    }
}
