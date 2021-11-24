<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Pack;
use App\Models\Paiment;
use App\Models\Message;
use Hash;
use Validator;
use Auth;

class OperationController extends Controller
{

  public function addition(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'value1' => 'required',
      'value2' => 'required'
    ]);
    //Check the validation becomes fails or not
    if ($validator->fails()) {
      //Return error message
      return response()->json(['error' => $validator->errors()->all()], 422);
    }
    $sumarry = array();
    $operation = array();
    $retention = array();
    $result = 0;
    $int1 = (int)$request->value1;
    $int2 = (int)$request->value2;
    $result = $int1 + $int2;
    $int1 = str_split($int1);
    $int2 = str_split($int2);
    $int1 = array_reverse($int1);
    $int2 = array_reverse($int2);
    if (count($int1) >= count($int2)) {
      $arrlength = count($int1);
      $max = $int1;
      $min = $int2;
      for ($x = 0; $x < $arrlength; $x++) {
        $retention[$x] = "0";
      }
    } else {
      $arrlength = count($int2);
      $max = $int2;
      $min = $int1;
      for ($x = 0; $x < $arrlength; $x++) {
        $retention[$x] = "0";
      }
    }
    $x = 0;
    $j = 0;
    $i = 0;
    $k = 0;
    $fin = $arrlength - 1;
    for ($x = 0; $x < $arrlength; $x++) {
      $sum = 0;
      if ($x == $fin) {
        if (($retention[$x] != 0) && (array_key_exists($x, $min))) {
          $sum =  $max[$x] + $retention[$x] + $min[$x];
          $operation[$k] = $max[$x] . "+" . $retention[$x] .  "=" . ($max[$x] + $retention[$x]);
          $k++;
          $operation[$k] = $max[$x] . "+" . $retention[$x] . "+" . $min[$x] . "=" . $sum;
          $k++;
          if ($sum > 9) {
            $items = str_split($sum);
            $sumarry[$j] = $items[1];
            $j++;
            $sumarry[$j] = $items[0];
          } else {
            $sumarry[$j] = (string)$sum;
            $j++;
          }
        } else if (($retention[$x] != 0) && (!array_key_exists($x, $min))) {
          $sum =  $max[$x] + $retention[$x];
          $operation[$k] = $max[$x] . "+" . $retention[$x] . "=" . $sum;
          $k++;
          if ($sum > 9) {
            $items = str_split($sum);
            $sumarry[$j] = $items[1];
            $j++;
            $sumarry[$j] = $items[0];
          } else {
            $sumarry[$j] = (string)$sum;
            $j++;
          }
        } else if (($retention[$x] == 0) && (array_key_exists($x, $min))) {
          $sum =  $max[$x] + $min[$x];
          $operation[$k] = $max[$x] . "+" . $min[$x] . "=" . $sum;
          $k++;
          if ($sum > 9) {
            $items = str_split($sum);
            $sumarry[$j] = $items[1];
            $j++;
            $sumarry[$j] = $items[0];
          } else {
            $sumarry[$j] = (string)$sum;
            $j++;
          }
        } else if (($retention[$x] == 0) && (!array_key_exists($x, $min))) {
          $sum =  $max[$x];
          $sumarry[$j] = (string)$sum;
        }
      } else {
        if (!is_null($retention[$x])) {
          if ($x != 0) {
            if ($retention[$x] != 0) {
              if (array_key_exists($x, $min)) {
                $sum =  $max[$x] + $min[$x] + $retention[$x];
                $operation[$k] = $max[$x] . "+" . $retention[$x] . "+" . $min[$x] . "=" . $sum;
                $k++;
              } else {
                $sum =  $max[$x] + $retention[$x];
                $operation[$k] = $max[$x] . "+" . $retention[$x] . "=" . $sum;
                $k++;
              }
              if ($sum > 9) {
                $items = str_split($sum);
                $sumarry[$j] = $items[1];
                $j++;
                $retention[$x + 1] = $items[0];
              } else if ($sum < 9) {
                $sumarry[$j] = (string)$sum;
                $j++;
              }
            } else {
              if (array_key_exists($x, $min)) {
                $sum =  $max[$x] + $min[$x];
                $operation[$k] = $max[$x] . "+" . $min[$x] . "=" . $sum;
                $k++;
                if ($sum > 9) {
                  $items = str_split($sum);
                  $sumarry[$j] = $items[1];
                  $j++;
                  $retention[$x + 1] = $items[0];
                } else {
                  $sumarry[$j] = (string)$sum;
                  $j++;
                }
              } else {
                $sumarry[$j] = (string)$max[$x];
                $j++;
              }
            }
          } else {
            $sum =  $int1[$x] + $int2[$x];
            $operation[$k] = $max[$x] . "+" . $min[$x] . "=" . $sum;
            $k++;
            if ($sum > 9) {
              $items = str_split($sum);
              $sumarry[$j] = $items[1];
              $j++;
              $i = $x + 1;
              $retention[$i] = $items[0];
            } else {
              $sumarry[$j] = (string) $sum;
              $j++;
            }
          }
        }
      }
    }
    $sumarry = array_reverse($sumarry);
    $retention = array_reverse($retention);


    //Return success message
    return response()->json(['operation' => $operation, 'retention' => $retention, 'result' => $result, 'reslist' => $sumarry], 200);
  }

  public function soustraction(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'value1' => 'required',
      'value2' => 'required'
    ]);
    //Check the validation becomes fails or not
    if ($validator->fails()) {
      //Return error message
      return response()->json(['error' => $validator->errors()->all()], 422);
    }
    $sousarry = array();
    $operation = array();
    $ihtifad = array();
    $addarry = array();
    $result = 0;
    $int1 = (int)$request->value1;
    $int2 = (int)$request->value2;
    if ($int1 >= $int2) {
      $result = $int1 - $int2;
      $val1 = $int1;
      $val2 = $int2;
      $int1 = str_split($int1);
      $int1 = array_reverse($int1);
      $int2 = str_split($int2);
      $int2 = array_reverse($int2);
      $max = $int1;
      $min = $int2;
    } elseif ($int1 < $int2) {
      $result = $int2 - $int1;
      $val1 = $int2;
      $val2 = $int1;
      $int1 = str_split($int1);
      $int1 = array_reverse($int1);
      $int2 = str_split($int2);
      $int2 = array_reverse($int2);
      $max = $int2;
      $min = $int1;
    }
    $arrlength = count($max);
    for ($x = 0; $x < $arrlength; $x++) {
      $ihtifad[$x] = 0;
      $addarry[$x] = 0;
    }
    $x = 0;
    $j = 0;
    $i = 1;
    $k = 0;
    $fin = $arrlength - 1;
    for ($x = 0; $x < $arrlength; $x++) {
      $sous = 0;
      if (($addarry[$x] == 0) && array_key_exists($x, $min)) {
        if ($max[$x] >= $min[$x]) {
          $sous =  $max[$x] - $min[$x];
          $operation[$k] = $max[$x] . "-" . $min[$x] . "=" . $sous;
          $k++;
          $sousarry[$j] = $sous;
          $j++;
        } else if ($max[$x] < $min[$x]) {
          $max[$x] =  $max[$x] + 10;
          $ihtifad[$x] = 10;
          $addarry[$x + 1] = 1;
          $sous = $max[$x] - $min[$x];
          $operation[$k] = $max[$x] . "-" . $min[$x] . "=" . $sous;
          $k++;
          $sousarry[$j] = $sous;
          $j++;
        }
      } else if (($addarry[$x] != 0) && (array_key_exists($x, $min))) {
        $operation[$k] = $min[$x] . "+" . $addarry[$x] . "=" . ($min[$x] + $addarry[$x]);
        $k++;
        $min[$x] =  $min[$x] + $addarry[$x];
        if ($max[$x] >= $min[$x]) {
          $sous =  $max[$x] - $min[$x];
          $operation[$k] = $max[$x] . "-" . $min[$x] . "=" . $sous;
          $k++;
          $sousarry[$j] = $sous;
          $j++;
        } else if ($max[$x] < $min[$x]) {
          $max[$x] =  $max[$x] + 10;
          $ihtifad[$x] = 10;
          $addarry[$x + 1] = 1;
          $sous =  $max[$x] - $min[$x];
          $operation[$k] = $max[$x] . "-" . $min[$x] . "=" . $sous;
          $k++;
          $sousarry[$j] = $sous;
          $j++;
        }
      } else if (($addarry[$x] != 0) && (!array_key_exists($x, $min))) {
        if ($max[$x] >= $addarry[$x]) {
          $sous =  $max[$x] - $addarry[$x];
          $operation[$k] = $max[$x] . "-" .  $addarry[$x] . "=" . $sous;
          $k++;
          $sousarry[$j] = $sous;
          $j++;
        } else if ($max[$x] < $addarry[$x]) {
          $max[$x] =  $max[$x] + 10;
          $ihtifad[$x] = 10;
          $addarry[$x + 1] = 1;
          $sous =  $max[$x] - $addarry[$x];
          $operation[$k] = $max[$x] . "-" . $addarry[$x] . "=" . $sous;
          $k++;
          $sousarry[$j] = $sous;
          $j++;
        }
      } else if (($addarry[$x] == 0) && !array_key_exists($x, $min)) {
        $sousarry[$j] =  $max[$x];
        $j++;
      }
    }
    $sousarry = array_reverse($sousarry);
    $ihtifad = array_reverse($ihtifad);
    $addarry = array_reverse($addarry);

    $r = str_split($result);
    $diff = count($r) - $arrlength ;
    if ($diff>0)
    {
        $nb1="0" .(string)$val1;
        $val1= str_split($nb1);
    }
    else {
    $val1= str_split((string)$val1);}
    $diff = count($r) - count($min);
    if ($diff>0)
    {
        $nb2="0" .(string)$val2;
        $val2= str_split($nb2);
    }
    else{
    $val1= str_split((string)$val1);}
    
    //Return success message
    return response()->json(['result' => $result, 'val1' => $val1, 'val2' => $val2, 'operation' => $operation, 'reslist' => $sousarry, 'retention' => $ihtifad, 'addarry' => $addarry], 200);
  }
  public function multiplication(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'value1' => 'required',
      'value2' => 'required'
    ]);
    //Check the validation becomes fails or not
    if ($validator->fails()) {
      //Return error message
      return response()->json(['error' => $validator->errors()->all()], 422);
    }
    $multiarry = array();
    $operation = array();
    $ihtifad = array();
    $result = 0;
    $res = "";
    $int1 = (int)$request->value1;
    $int2 = (int)$request->value2;
    if ($int1 >= $int2) {
      $result = $int1 * $int2;
      $val1 = $int1;
      $val2 = $int2;
      $int1 = str_split($int1);
      $int1 = array_reverse($int1);
      $int2 = str_split($int2);
      $int2 = array_reverse($int2);
      $max = $int1;
      $min = $int2;
    } else if ($int1 < $int2) {
      $result = $int2 * $int1;
      $val1 = $int2;
      $val2 = $int1;
      $int1 = str_split($int1);
      $int1 = array_reverse($int1);
      $int2 = str_split($int2);
      $int2 = array_reverse($int2);
      $max = $int2;
      $min = $int1;
    }
    $arrlength = count($max);
    $ihtifad[0] = 0;
    $arrmin = count($min);
    $b = 0;
    $i = 0;
    $k = 0;
    $listop = array();
    for ($x = 0; $x < $arrlength; $x++) {
      $ihtifad[$x] = "0";
    }

    for ($x = 0; $x < $arrmin; $x++) {
      $a = 0;
      if ($x != 0) {
        unset($multiarry);
        $multiarry = array();
        /*$multiarry[$i]="+";
        $i++;*/
        $ihtifad[$b] = "+";
        //$b++;
        $ihtifad[$b + 1] = "0";
        $b++;
        while ($a < $x) {
          $multiarry[$i] = "0";
          $i++;
          $a++;
        }
      }
      for ($j = 0; $j < $arrlength; $j++) {

        if ($j != ($arrlength - 1)) {
          if (($ihtifad[$b] == 0) && array_key_exists($x, $min)) {
            $multi = $min[$x] * $max[$j];
            $operation[$k] = $min[$x] . "*" . $max[$j] . "=" . $multi;
            $k++;
            if ($multi > 9) {
              $items = str_split($multi);
              $multiarry[$i] = $items[1];
              $i++;
              $ihtifad[$b + 1] = $items[0];
              $b++;
            } else {
              $multiarry[$i] = (string)$multi;
              $i++;
              $ihtifad[$b + 1] = (string)0;
              $b++;
            }
          } else if (($ihtifad[$b] != 0) && array_key_exists($x, $min)) {
            $multi = $min[$x] * $max[$j];
            $operation[$k] = $min[$x] . "*" . $max[$j] . "=" . $multi;
            $k++;
            $operation[$k] = $multi . "+" . $ihtifad[$b] . "=" . ($multi + $ihtifad[$b]);
            $multi = $multi + $ihtifad[$b];
            $k++;
            if ($multi > 9) {
              $items = str_split($multi);
              $multiarry[$i] = $items[1];
              $i++;
              $ihtifad[$b + 1] = $items[0];
              $b++;
            } else {
              $multiarry[$i] = (string)$multi;
              $i++;
              $ihtifad[$b + 1] = (string)0;
              $b++;
            }
          }
        } else {
          if (($ihtifad[$b] == 0) && array_key_exists($x, $min)) {
            $multi = $min[$x] * $max[$j];
            $operation[$k] = $min[$x] . "*" . $max[$j] . "=" . $multi;
            $k++;
            if ($multi > 9) {
              $items = str_split($multi);
              $multiarry[$i] = $items[1];
              $i++;
              $multiarry[$i + 1] = $items[0];
              $i++;
              $ihtifad[$b + 1] = (string)0;
              $b++;
            } else {
              $multiarry[$i] = (string)$multi;
              $i++;
              $ihtifad[$b + 1] = (string)0;
              $b++;
            }
          } else if (($ihtifad[$b] != 0) && array_key_exists($x, $min)) {
            $multi = $min[$x] * $max[$j];
            $operation[$k] = $min[$x] . "*" . $max[$j] . "=" . $multi;
            $k++;
            $operation[$k] = $multi . "+" . $ihtifad[$b] . "=" . ($multi + $ihtifad[$b]);
            $k++;
            $multi = $multi + $ihtifad[$b];
            if ($multi > 9) {
              $items = str_split($multi);
              $multiarry[$i] = $items[1];
              $i++;
              $multiarry[$i + 1] = $items[0];
              $i++;
              $ihtifad[$b + 1] = (string)0;
              $b++;
            } else {
              $multiarry[$i] = (string)$multi;
              $i++;
              $ihtifad[$b + 1] = (string)0;
              $b++;
            }
          }
          $listop[$x] = array_reverse($multiarry);
        }
      }
    }

    $ihtifad = array_reverse($ihtifad);
    $r = str_split($result);
    return response()->json(['result' => $r, 'val1' => $val1, 'val2' => $val2, 'reslist' => $listop, 'retention' => $ihtifad, 'operation' => $operation], 200);
  }

  public function division(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'value1' => 'required',
      'value2' => 'required'
    ]);
    //Check the validation becomes fails or not
    if ($validator->fails()) {
      //Return error message
      return response()->json(['error' => $validator->errors()->all()], 422);
    }
    $resarry = array();
    $operation = array();
    $ihtifad = array();
    $result = 0;
    $int1 = (int)$request->value1;
    $int2 = (int)$request->value2;
    if ($int1 >= $int2) {
      $result = $int1 / $int2;
      if (is_float($result)) {
        $cvrt = (string)$result;
        $cvrt = strtok($cvrt, '.');
        $result = (int)$cvrt;
      }
      $val1 = $int1;
      $val2 = $int2;
      $int1 = str_split($int1);
      //$int1=array_reverse($int1);
      $int2 = str_split($int2);
      //$int2=array_reverse($int2);
      $max = $int1;
      $min = $int2;
    } elseif ($int1 < $int2) {
      $result = $int2 / $int1;
      if (is_float($result)) {
        $cvrt = (string)$result;
        $cvrt = strtok($cvrt, '.');
        $result = (int)$cvrt;
      }
      $val1 = $int2;
      $val2 = $int1;
      $int1 = str_split($int1);
      //$int1=array_reverse($int1);
      $int2 = str_split($int2);
      //$int2=array_reverse($int2);
      $max = $int2;
      $min = $int1;
    }
    $arrlength = count($max);
    $ihtifad[0] = 0;
    $arrmin = count($min);
    $b = 0;
    $i = 0;
    $k = 0;
    $listop = array();
    $div = "0";
    $op = 0;
    for ($j = 0; $j < $arrlength; $j++) {
      $x = 0;
      $a = 0;
      $sousarry = array();
      $divarry = array();
      if ($div == "0") {
        if ($max[$j] >= $val2) {
          for ($m = 0; $m < $arrlength; $m++) {
            $divarry[$m] = "-";
            $sousarry[$m] = "-";
          }
          $div = $max[$j];
          $op++;
          $multi = $div / $val2;
          if (is_float($multi)) {
            $cvrt = (string)$multi;
            $cvrt = strtok($cvrt, '.');
            $multi = (int)$cvrt;
          }
          $resarry[$i] = (string)$multi;
          $i++;
          $r = $val2 * $multi;
          if ($r > 9) {
            $items = str_split($r);
            if ($op > 1) {
              $items = array_reverse($items);
            }
            for ($t = 0; $t < count($items); $t++) {
              $divarry[$x] = $items[$t];
              $x++;
            }
          } else {
            $divarry[$x] = (string)$r;
            $x++;
          }
          $operation[$k] = $val2 . "x" . $multi . "=" . $r;
          $k++;
          $sous = $div - $r;
          /*$divarry[$x]=$sous;
                  $x++;*/
          $operation[$k] = $div . "-" . $r . "=" . $sous;
          $k++;
          if (($sous > 0) && ($sous > 9)) {
            $items = str_split($sous);
            if ($op > 1) {
              $items = array_reverse($items);
            }
            for ($n = 0; $n < count($items); $n++) {
              $sousarry[$a] = $items[$n];
              $a++;
            }
            $div = $sous;
            $rest = $sous;
          } 
          else if (($sous > 0) && ($sous < 9)) {
            $sousarry[$a] = (string)$sous;
            $a++;
            $div = $sous;
            $rest = $sous;
          } 
          else {
            if ($div > 9) {
              $items = str_split($div);
              foreach ($items as $char) {
                //00
                $sousarry[$a] = (string)$sous;
                $a++;
              }
            } 
            else {
              //0  
              $sousarry[$a] = (string)$sous;
              $a++;
            }
            $div = "0";
            $rest = 0;
          }
          if (array_key_exists($j + 1, $max)) 
          {

            if ($div == "0") {
              if ($max[$j + 1] > $val2) {
                $sousarry[$a] = $max[$j + 1];
                $a++;
              } 
              else {
                $sousarry[$a] = $max[$j + 1];
                $a++;
                if (array_key_exists($j + 2, $max)) {
                  $sousarry[$a] = $max[$j + 2];
                  $a++;
                }
              }
            } 
            else {
              $sousarry[$a] = $max[$j + 1];
              $a++;
            }
          }
          /*if ($j == 1) {
            $listop[$b] = $divarry;
            $b++;
            $listop[$b] = $sousarry;
            $b++;
          } 
          else {
            $listop[$b] = array_reverse($divarry);
            $b++;
            $listop[$b] = array_reverse($sousarry);
            $b++;
          }*/
          $listop[$b] = $divarry;
            $b++;
            $listop[$b] = $sousarry;
            $b++;
        } 
        else {
          if ($op >= 1) {
            $resarry[$i] = "0";
            $i++;
            /*for($m = 0; $m < $arrlength; $m++) 
                {  
                  $divarry[$m] = "-";
                  $sousarry[$m] = "-";
                }
                $divarry[$x]=(string)0;
                $x++; 
                $div=$max[$j];
                if($div>9)  
                { 
                    $items = str_split($div); 
                    foreach ($items as $char) {
                    $sousarry[$a]=(string)$char;
                    $a++;
                    }
                }
                else{  
                  $sousarry[$a]=(string)$div;
                  $a++; 
                }*/
            /*$listop[$b]= array_reverse($divarry); 
                    $b++;*/
            /*$listop[$b]= array_reverse($sousarry);
                    $b++;*/
          }
          $div = $max[$j];
        }
      }
      else {
        $div .= $max[$j];
        if ($div >= $val2) {
          for ($m = 0; $m < $arrlength; $m++) {
            $divarry[$m] = "-";
            $sousarry[$m] = "-";
          }
          $multi = $div / $val2;
          $op++;
          if (is_float($multi)) {
            $cvrt = (string)$multi;
            $cvrt = strtok($cvrt, '.');
            $multi = (int)$cvrt;
          }
          $resarry[$i] = (string)$multi;
          $op=$i;
          $i++;
          $r = $val2 * $multi;
          if ($r > 9) {
            $items = str_split($r);
            if ($op > 1) {
              $items = array_reverse($items);
            }
            for ($n = 0; $n < count($items); $n++) {
              $divarry[$x] = $items[$n];
              $x++;
            }
          } else {
            $divarry[$x] = (string)$r;
            $x++;
          }
          $operation[$k] = $val2 . "*" . $multi . "=" . $r;
          $k++;
          $sous = $div - $r;
          /*$divarry[$x]=$sous;
                    $x++ ;*/
          $operation[$k] = $div . "-" . $r . "=" . $sous;
          $k++;
          if (($sous > 0) && ($sous > 9)) {
            $items = str_split($sous);
            if ($op > 1) {
              $items = array_reverse($items);
            }
            for ($n = 0; $n < count($items); $n++) {
              $sousarry[$a] = $items[$n];
              $a++;
            }
            $div = $sous;
            $rest = $sous;
          } 
          else if (($sous > 0) && ($sous < 9)) {
            $sousarry[$a] = (string)$sous;
            $a++;
            $div = $sous;
            $rest = $sous;
          } 
          else {
            if ($div > 9) {
              $items = str_split($div);
              foreach ($items as $char) {
                $sousarry[$a] = (string)$sous;
                $a++;
              }
            } else {
              $sousarry[$a] = (string)$sous;
              $a++;
            }
            $div = "0";
            $rest = 0;
          }
          if (array_key_exists($j + 1, $max)) {

            if ($div == "0") {
              if ($max[$j + 1] > $val2) {
                $sousarry[$a] = $max[$j + 1];
              } else {
                $sousarry[$a] = $max[$j + 1];
                $a++;
                if (array_key_exists($j + 2, $max)) {
                  $sousarry[$a] = $max[$j + 2];
                  $a++;
                }
              }
            } else {
              $sousarry[$a] = $max[$j + 1];
            }
          }
           if ($op == 1) {
            $listop[$b] = $divarry;
            $b++;
            $listop[$b] = $sousarry;
            $b++;
          } else {
            $listop[$b] = array_reverse($divarry);
            $b++;
            $listop[$b] = array_reverse($sousarry);
            $b++;
          }
        }
      }
    }

    $r = str_split($result);
    return response()->json(['result' => $r, 'val1' => $val1, 'val2' => $val2, 'reslist' => $listop, 'operation' => $operation,], 200);
  }
}
