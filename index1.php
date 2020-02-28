<?php
// Задание 1
// При помощи языка PHP создайте двумерный массив размером 6х6, 
// заполните его числами из последовательности Фибоначчи таким образом, 
// чтобы в углу [0][0] была единица, в ячейке [1][0] была единица, 
// в ячейке [2][0] была цифра 2. Найдите сумму чисел находящихся 
// на диагонали [5][0]-[0][5]
// Ответом является число.

// Саенко Александр
// tested by PHP 7.2

/**
 * @Функция получения индекса матрицы
 * @param int $k
 * @return array
 */
function getIndex($k)
{
	global $size;
	$ind[0] = floor($k/$size);
	$ind[1] = $k - (floor($k/$size))*$size;	
	return $ind;
}

/**
 * @Функция получения суммы чисел по диагонали матрицы
 * @param int $size
 * @return int
 */
function fibonacci($size)
{
	$arr = [];
	$k = 0;
	$start = $size-1;

	for ($i=0; $i<$size; $i++){
		
		for ($j=0; $j<$size; $j++){
			
			$ind1 = getIndex($k-1);
			$ind2 = getIndex($k-2);
			$value = ($k > 1) 
				? ($arr[$ind1[0]][$ind1[1]] + $arr[$ind2[0]][$ind2[1]])
				: 1;
			$arr[$i][$j] = $value;
	
			if ($j == $start){
				$sum += $value;
				$start--;
			}
			$k++;
		}
		
	}
 return $sum;
}

$size = 6; // размер матрицы 6х6

print_r(fibonacci($size));


?>