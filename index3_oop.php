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
 
Class Decoder
{
	public $str;
	private $result;
	
	public function setStr($str)
	{
		$this->str = $str;
	}
	
	public function getValue($n)
	{
		$v = '';
		while(is_numeric(mb_substr($this->str, $n, 1))){
			$v .= mb_substr($this->str, $n, 1);
			$n++;
		}
		return (int)$v;
	}
	
	public function st($value)
	{
		return mb_substr($this->str, $value, 1, 'UTF-8');
	}
	
	public function toPrint()
	{
		echo $this->decode();
	}
	
	public function decode()
	{
		$i = 0;
		$this->result = '';
		
		 while ($i < mb_strlen($this->str, 'UTF-8')){

			switch (self::st($i)){
				case "+":	
							$value = self::getValue($i+1);
							$i += strlen($value) + $value + 1;				
							break;	
				case "-":	
							if (self::st($i+1) != ">"){
								$value = self::getValue($i+1);
								$i -=abs(strlen($value) - $value + 1); 
							}elseif (self::st($i+1) == ">"){
								$value = self::getValue($i+2);
								$this->result .= self::st(self::getValue($i+2));
								$i =$value+1; 
							}
							break;		
				default :	
							$this->result .= self::st($i);
							$i++;
							break;
			}				
		 }
		return $this->result;
	}
}


$obj = new Decoder();
$obj->setStr('->11гe+20∆∆A+4µcњil->5•Ћ®†Ѓ p+5f-7Ќ¬f pro+10g+1悦ra->58->44m+1*m+2a喜er!');
$obj->toPrint();

?>