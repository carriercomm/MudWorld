<?php
namespace MudWorld\Core;

class MudConfig 
{
  protected $config = array();

  public function __construct()
  {

  }


  public function getBasePaht()
  {
    return $this->config['base_path'];
  }

}
