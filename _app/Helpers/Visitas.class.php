<?php

/**
 * Visitas.class [ HELP ]
 * Classe responsavel por realizar a contagem de visitas ao site, navegador usado
 * ip do usuário.
 * @copyright (c) year, Kleber de Souza BRAZISTELECOM
 */
class Visitas {

    private $Ip;
    private $Id;
    private $IpVerificado;
    private $Agent;
    private $Browser;
    private $Visitas;
    private $TotalVisitas;
    private $Result;
    private $Data;
    private $DiaAnterior;

    //Nome da tabela no banco de dados.
    const Tabela = "kl_contador";

    //Construtor da Classe
    public function __construct($ip, $navegador) {
        $this->Ip = $ip;
        $this->Agent = $navegador;

        $this->verificaIp();
        $this->verificaAgent();
        $this->setData();
    }

    /** Retorna o resultado  */
    public function getResult() {
        return $this->Result;
    }

    /**
     * ****************************************
     * *********** PRIVATE METHODS ************
     * ****************************************
     */
    // Metodo que verifica qual navegador usado pelo visitante
    private function verificaAgent() {

        if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $this->Agent, $matched)):
            $browser_version = $matched[1];
            $browser = 'IE';
        elseif (preg_match('|Opera/([0-9].[0-9]{1,2})|', $this->Agent, $matched)):
            $browser_version = $matched[1];
            $browser = 'Opera';
        elseif (preg_match('|Firefox/([0-9\.]+)|', $this->Agent, $matched)):
            $browser_version = $matched[1];
            $browser = 'Firefox';
        elseif (preg_match('|Chrome/([0-9\.]+)|', $this->Agent, $matched)):
            $browser_version = $matched[1];
            $browser = 'Chrome';
        elseif (preg_match('|Safari/([0-9\.]+)|', $this->Agent, $matched)):
            $browser_version = $matched[1];
            $browser = 'Safari';
        else:
            // Navegador não Reconhecido!
            $browser_version = 0;
            $browser = 'other';
        endif;

        $this->Browser = $browser;
    }

    // Metodo que verifica qual o ip do visitante
    private function verificaIp() {

        $read = new Read;
        $read->ExeRead(self::Tabela, "WHERE contador_ip = :ip", "ip={$this->Ip}");
        $resultado = $read->getResult();

        if ($resultado):

            $this->IpVerificado = true;
            $this->Result = $resultado;

        else:

            $this->IpVerificado = false;
            $this->Result = $resultado;

        endif;
    }

    // Prepara os dados para cadastro no banco
    private function setData() {

        if ($this->IpVerificado == TRUE):

            $res = $this->Result[0];            
            $this->Id = $res['contador_id'];            
            $this->Data['contador_ip'] = $res['contador_ip'];           
            $this->Data['contador_data'] = $res['contador_data'];
            $this->Data['contador_browser'] = $this->Browser;
            $this->Data['contator_visitas'] = $res['contator_visitas'] + 1;

            //Instancia da classa para comparar o dia
            $this->comparaDatas();
            if ($this->Result != true):
                //altera a data
                $this->Data['contador_data'] = Date("Y-m-d H:i:s");
                //Instancia para alterar dados do visitante
                $this->Update();                
            else:                
            endif;

        else:

            $this->Data['contador_ip'] = $this->Ip;
            $this->Data['contador_data'] = Date("Y-m-d H:i:s");
            $this->Data['contador_browser'] = $this->Browser;
            $this->Data['contator_visitas'] = (int) 1;

            //Instancia para Incluir o visitante
            $this->Create();

        endif;
    }
    
    //Metodo para comparar dia da visita
    private function comparaDatas() {
        $diaHoje = date("d");

        $explodeDataTime = explode(" ", $this->Data['contador_data']);
        $expodeData = explode("-", $explodeDataTime[0]);
        $diaAnterior = $expodeData[2];
       
        if ($diaAnterior == $diaHoje):
            $this->Result = true;
        else:
            $this->Result = false;
        endif;
    }

    // Execulta o cadastro no banco de Dados.
    private function Create() {

        $create = new Create;
        $create->ExeCreate(self::Tabela, $this->Data);

        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Erro = array("<b>Sucesso:</b> A Vista foi computado no sietema!", KL_ACCEPT);
        endif;
    }

    /** Execulta a alteração dos dados */
    private function Update() {
        $update = new Update;
        $update->ExeUpdate(self::Tabela, $this->Data, "WHERE contador_id = :id AND contador_ip = :ip", "id={$this->Id}&ip={$this->Data['contador_ip']}");

        if ($update->getResult()):
            $this->Result = $update->getResult();
            $this->Erro = array("<b>Sucesso:</b> A visita foi computado no sietema!", KL_ACCEPT);
        endif;
    }

}
