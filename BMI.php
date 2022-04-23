<?php
class BMI{
    public $berat;
    public $tinggi;

    function __construct($berat, $tinggi){
        $this->berat = $berat;
        $this->tinggi = $tinggi;
    }

    function nilaiBMI(){
        $hasil = $this->berat / (($this->tinggi**2)/10000);
        return number_format($hasil, 1);
    }

    function statusBMI(){
        if ($this->nilaiBMI()>= 30){
            echo 'Kegemukan (Obesitas)';
        } elseif ($this->nilaiBMI()>= 25 && $this->nilaiBMI() <= 29.9){
            echo 'Kelebihan berat badan';
        } elseif ($this->nilaiBMI() >= 18.5 && $this->nilaiBMI() <= 24.9){
            echo 'Normal (Ideal)';
        } elseif ($this->nilaiBMI()< 18.5){
            echo 'Kekurangan berat badan';
        }
    }
}
?>