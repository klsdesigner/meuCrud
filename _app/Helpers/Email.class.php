<?php

/**
 * Email.class [ HELPER ]
 * Classe responsável por enviar e-mail autenticados com PHPMailer
 * @copyright (c) 16/08/2016, Kleber de Souza BRAZISTELECOM
 */
class Email {

    // Atributos
    private $Assunto;
    private $Mensagem;
    private $Remetente;
    private $NomeRemetente;
    private $Destino;
    private $NomeDestino;
    private $Reply;
    private $ReplyName;
    private $Anexo;
    private $Resultado;

    /** METODO PARA ENVIO DE E-MAIL  */
    public function EnviaEmail($assunto, $mensagem, $remetente, $nomeRemetente, $destino, $nomeDestino, $anexo = NULL, $reply = NULL, $replyName = NULL) {

        $this->Assunto = $assunto;
        $this->Mensagem = $mensagem;
        $this->Remetente = $remetente;
        $this->NomeRemetente = $nomeRemetente;
        $this->Destino = $destino;
        $this->NomeDestino = $nomeDestino;
        $this->Reply = $reply;
        $this->ReplyName = $replyName;
        $this->Anexo = $anexo;

        //var_dump($this->remetente);exit;

        $this->SendEmail();
    }

    /** Retorna o resultado */
    function getResultado() {
        return $this->Resultado;
    }

    /**
     * ****************************************
     * *********** PRIVATE METHODS ************
     * ****************************************
     */
    // Conecta com o phpMailer e envia a mensagem
    private function SendEmail() {
        
        /** Inclui a classe do phpMailer */
        if (realpath("_app/Library/phpmailer/class.phpmailer.php")):
            
            require_once("_app/Library/phpmailer/class.phpmailer.php");
            require_once ('_app/Library/phpmailer/class.smtp.php');
            
            
            
        elseif(realpath("../_app/Library/phpmailer/class.phpmailer.php")):
                        
            require_once("../_app/Library/phpmailer/class.phpmailer.php");
            require_once ('../_app/Library/phpmailer/class.smtp.php');            
            
        else:
                        
            require_once("../../../_app/Library/phpmailer/class.phpmailer.php");
            require_once ('../../../_app/Library/phpmailer/class.smtp.php');    
            
        endif;

  

        $mail = new PHPMailer; // Inicia a classe
        # Define os dados do servidor e tipo de conexão
        $mail->IsSMTP(); # Define que a mensagem será SMTP
        $mail->Host = MAILHOST; # Servidor de envio
        $mail->Port = MAILPORT; # Porta de envio SMTP
        $mail->SMTPAutoTLS = false; # Utiliza TLS Automaticamente se disponível
        $mail->SMTPAuth = true; # Usar autenticação SMTP - Sim
        $mail->Username = MAILUSER; # EMAIL do servidor
        $mail->Password = MAILPASS; # Senha do email servidor
        # Define o remetente (você)  
        $mail->From = $this->Remetente;
        $mail->FromName = utf8_decode($this->NomeRemetente);


        # Define os destinatário(s)
        $mail->AddAddress(utf8_decode($this->Destino), utf8_decode($this->NomeDestino)); // Email e nome do destino
        #$mail->AddAddress('webmaster@nomedoseudominio.com'); # Caso queira receber uma copia
        #$mail->AddCC('ciclano@site.net', 'Ciclano'); # Copia
        #$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); # Cópia Oculta
        # Define os dados técnicos da Mensagem
        $mail->IsHTML(true); # Define que o e-mail será enviado como HTML
        #$mail->CharSet = 'iso-8859-1'; # Charset da mensagem (opcional)
        # Define a mensagem (Texto e Assunto)
        $mail->Subject = utf8_decode($this->Assunto); // Assunto
        $mail->Body = utf8_decode($this->Mensagem); // Mensagem
        $mail->AltBody = $mail->Body = utf8_decode($this->Mensagem);

        # Define os anexos (opcional)
        if ($this->Anexo != NULL):
            $mail->addAttachment($this->Anexo['tmp_name'], $this->Anexo['name']); // Add attachments
        endif;

        # Envia o e-mail
        $enviado = $mail->Send();

        if ($enviado) :
            $this->Resultado = TRUE;
        else:
            $this->Resultado = FALSE;
        endif;
    }

}

#fim da class