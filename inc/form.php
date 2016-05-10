<?php

class form{
  private $data;

  public function __construct($data=array()){
    $this->data = $data;
  }


  // Renvoie quelle catégorie est cochée.
  public function checked($name){
    if (empty($_POST[$name])){
      echo $name.' n est pas coché.';
    }else{
      echo $name.' est coché.';
    }
    echo '<br>';
  }

  public function search($search){
    if(empty($search)){
      echo 'Veuillez entrer quelque chose a rechercher<br>';
    }else{
      echo $search . '<br>';
    }
  }

  public function checkbox($name){
    return '<input name="'. $name .'" checked="checked" value="'. $name .'" type="checkbox">'. $name . '<br>  ';
  }

  public function select($name){
    return '<option value="' . $name . '">' . $name . '</option>';
  }

  public function annee($annee){
    if($annee == 'avant 1920'){
      $tranche = array(0, 1920);
    }elseif($annee == 'après 2010'){
      $tranche = array(2010, 9999);
    }else{
    $tranche = explode(' à ', $annee);
    }
    print_r($tranche);
  }

  private function getValue($index){
      return isset($this->data[$index]) ? $this->data[$index] : null;
  }

  public function input($name){
      echo '<label for="">' . $name . '</label>';
      return '<input type=text" name="' . $name . '" value="' . $this->getValue($name) . '"><br>';
   }

  public function submit(){
     return '<br><button type="submit">envoyer</button>';
  }

}
