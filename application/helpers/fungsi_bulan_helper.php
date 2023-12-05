<?php 


function bulan($bulan)
  {
    if ($bulan==1) {
      echo "JAN";
    }elseif ($bulan==2) {
      echo "FEB";
    }elseif ($bulan==3) {
      echo "MAR";
    }elseif ($bulan==4) {
      echo "APR";
    }elseif ($bulan==5) {
      echo "MEI";
    }elseif ($bulan==6) {
      echo "JUN";
    }elseif ($bulan==7) {
      echo "JUL";
    }elseif ($bulan==8) {
      echo "AGU";
    }elseif ($bulan==9) {
      echo "SEP";
    }elseif ($bulan==10) {
      echo "OKT";
    }elseif ($bulan==11) {
      echo "NOV";
    }elseif ($bulan==12) {
      echo "DES";
    }
  }



  function bulan_detail($bulan)
  {
    if ($bulan==1) {
      echo "JANUARI";
    }elseif ($bulan==2) {
      echo "FEBRUARI";
    }elseif ($bulan==3) {
      echo "MARET";
    }elseif ($bulan==4) {
      echo "APRIL";
    }elseif ($bulan==5) {
      echo "MEI";
    }elseif ($bulan==6) {
      echo "JUNI";
    }elseif ($bulan==7) {
      echo "JULI";
    }elseif ($bulan==8) {
      echo "AGUSTUS";
    }elseif ($bulan==9) {
      echo "SEPTEMBER";
    }elseif ($bulan==10) {
      echo "OKTOBER";
    }elseif ($bulan==11) {
      echo "NOVEMBER";
    }elseif ($bulan==12) {
      echo "DESEMBER";
    }
  }

  function notasi($f_notasi)
  {
    if ($f_notasi=='t') {
       $f_notasi = 2022;
    }elseif ($f_notasi=='t-1') {
       $f_notasi = 2021;
    }elseif ($f_notasi=='t-2') {
       $f_notasi = 2020;
    }elseif ($f_notasi=='2021') {
       $f_notasi = 2021;
    }elseif ($f_notasi=='2020') {
       $f_notasi = 2020;
    }

    return $f_notasi;
  }

  ?>