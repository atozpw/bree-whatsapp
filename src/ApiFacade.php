<?php

namespace Atozpw\BreeWhatsapp;

use Illuminate\Support\Facades\Facade;

class ApiFacade extends Facade {
	protected static function getFacadeAccessor() { return 'bree-whatsapp'; }
}