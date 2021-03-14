<?php
 
namespace Atozpw\BreeWhatsapp;

class Api
{
    protected $host;

    public function __construct() {
		$this->host = config('bree-whatsapp.bree_whatsapp_host');
	}
    
    public function sendText($number, $message) {
        $data = array('number' => $number, 'message' => $message);

        $url = $this->host . '/send-message';
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
        $curlfile = new \CURLFILE($file->path(), $file->getClientMimeType(), $file->getClientOriginalName());
        $data = array('number' => $number, 'caption' => $message, 'file' => $curlfile);
        $header = array('Content-Type: multipart/form-data');

        $url = $this->host . '/send-media';
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
}