<?php

// Задание 3
// Дан шифр ->11гe+20∆∆A+4µcњil->5•Ћ®†Ѓ p+5f-7Ќ¬f pro+10g+1悦ra->58->44m+1*m+2a喜er!
// Правила его расшифровки следующие: 
// - Начинать чтение нужно с крайнего левого символа и двигаться вправо.
// - Если вы сталкиваетесь с любым символом, кроме специальных обозначений, то данный символ без изменений попадает в результирующую строчку.
// - Специальными обозначениями являются "->", "+", "-". После специального обозначения всегда идет число, являющееся аргументом.
// - "->" — вам необходимо перейти к символу с номером, записанном в аргументе (счет начинается с 0).
// - "+" — пропустить столько символов, сколько записано в аргументе. Отсчет начинается после аргумента.
// - "-" — аналогично, но перемещение происходит назад (влево)
// Программа должна быть написана на PHP. Ответом является строчка.

// Саенко Александр
// tested by PHP 7.2

/**
 * @Функция получения значения аргумента 
 * @param int $n
 * @return int
 */
function getValue($n)
{
	global $str;
	$v = '';
	while(is_numeric(mb_substr($str, $n, 1))){
		$v .= mb_substr($str, $n, 1);
		$n++;
	}
	return (int)$v;
}

/**
 * @Функция получения символа многобайтовой строки
 * @param int $value
 * @return string
 */
function st($value)
{
	global $str;
	return mb_substr($str, $value, 1, 'UTF-8');
}

/**
 * @Функция декодирования
 * @param string $str
 * @return string
 */
function decode($str)
{
	$i = 0;
	$result = '';
	
	 while ($i < mb_strlen($str, 'UTF-8')){

		switch (st($i)){
			case "+":	
						$value = getValue($i+1);
						$i += strlen($value) + $value + 1;				
						break;	
			case "-":	
						if (st($i+1) != ">"){
							$value = getValue($i+1);
							$i -=abs(strlen($value) - $value + 1); 
						}elseif (st($i+1) == ">"){
							$value = getValue($i+2);
							$result .= st(getValue($i+2));
							$i =$value+1; 
						}
						break;		
			default :	
						$result .= st($i);
						$i++;
						break;
		}				
	 }
	return $result;
}

$str = '->11гe+20∆∆A+4µcњil->5•Ћ®†Ѓ p+5f-7Ќ¬f pro+10g+1悦ra->58->44m+1*m+2a喜er!';

print_r(decode($str));

?>