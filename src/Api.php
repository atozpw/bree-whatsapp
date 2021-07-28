<?php
 
namespace Atozpw\BreeWhatsapp;

class Api
{
    protected $host;
    protected $port;

    public function __construct() {
		$this->host = config('bree-whatsapp.bree_whatsapp_host');
		$this->port = config('bree-whatsapp.bree_whatsapp_port');
	}
    
    public function sendText($number, $message) {
        $url = $this->host . ':' . $this->port . '/send-text';
        $data = array('number' => $number, 'message' => $message);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        return $response;
    }

    public function sendImage($number, $message, $file) {
        $url = $this->host . ':' . $this->port . '/send-image';
        $curlfile = new \CURLFILE($file->path(), $file->getClientMimeType(), $file->getClientOriginalName());
        $data = array('number' => $number, 'caption' => $message, 'file' => $curlfile);
        $header = array('Content-Type: multipart/form-data');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $response = curl_exec($ch);
        return $response;
    }
    
    public function getStatus($id) {
        $url = $this->host . ':' . $this->port . '/get-status';
        $data = array('id' => $id);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        return $response;
    }
}