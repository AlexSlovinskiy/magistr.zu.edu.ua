<?php
$speciality="7.010103 ����. ���� �� ��������� (���������). 7.010105 ��������� ���������. ������������: ���������-���������� ������ � �쒺�.";
  $pattern='{((\d\.\d+\s+) (\D+) ((\d\.\d+\s+) (\D+))* )$}xis';
 preg_match($pattern,$speciality ,$pockets);

   echo $pockets[0]."<br />";
   echo $pockets[1]."<br />";
   echo $pockets[2]."<br />";
   echo $pockets[3]."<br />";
   echo $pockets[4]."<br />";
   echo $pockets[5]."<br />";
   echo $pockets[6]."<br />";
   echo $pockets[7]."<br />";
?>