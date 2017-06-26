<?php

/**
 * Класс сортировки массивов.
 * Работает только с одномерными числовыми массивами
 *
 * Class Sort
 */
class Sort
{
    /**
     * Меняет местами элементы массива
     *
     * @param array $mas
     * @param $left
     * @param $right
     *
     * @return array|bool
     */
    private static function swap($mas, $left, $right)
    {
        if($left != $right && is_array($mas))
        {
            $temp = $mas[$left];
            $mas[$left] = $mas[$right];
            $mas[$right] = $temp;

            return $mas;
        }
        return false;
    }

    /**
     * Сортировка пузырьком
     *
     * @param array $mas
     *
     * @return array|bool
     */
    public static function bubbleSort($mas)
    {
        if(is_array($mas))
        {
            do
            {
                $swapped = false;
                for($i = 1; $i < count($mas); $i++)
                {
                   if($mas[$i-1] > $mas[$i])
                   {
                       $mas = self::swap($mas, $i-1, $i);
                       $swapped = true;
                   }
                }

            }while($swapped != false);

            return $mas;
        }
        return false;
    }

    /**
     * Сортировка вставками
     *
     * @param $mas
     *
     * @return array|bool
     */
    public static function insertSort($mas)
    {
        if(is_array($mas))
        {
            for($i = 1; $i < count($mas); $i++)
            {
                $rightValue = $mas[$i];
                $leftIndex = $i-1;

                while($leftIndex >= 0 && $mas[$leftIndex]>$rightValue)
                {
                    $mas[$leftIndex+1] = $mas[$leftIndex];
                    $leftIndex--;
                }
                $mas[++$leftIndex] = $rightValue;
            }
            return $mas;
        }
        return false;
    }


    /**
     * Сортировка выбором
     *
     * @param $mas
     *
     * @return array|bool
     */
    public static function selectSort($mas)
    {
        if(is_array($mas))
        {
            $size = count($mas);
            for($i = 0; $i < $size-1; $i++)
            {
                $min = $i;

                for($j = $i + 1; $j < $size; $j++)
                {
                    if($mas[$min] > $mas[$j])
                    {
                        $min = $j;
                    }
                }
                $mas = self::swap($mas, $i, $min);
            }
            return $mas;
        }
        return false;
    }


}