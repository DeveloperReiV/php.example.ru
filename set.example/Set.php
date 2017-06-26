<?php

/**
 * Класс реализующий множество и операции с ним
 *
 * Class Set
 */
class Set
{
    public $set = [];

    public function __construct(array $set = null)
    {
        $this->set = $set;
    }

    /**
     * Добавляет элемент во множество
     *
     * @param $element
     * @param bool|false $duplicate
     */
    public function add($element, $duplicate = false)
    {
        if($duplicate)
        {
            array_push($this->set, $element);
        }
        else
        {
            if(!in_array($element, $this->set))
            {
                array_push($this->set, $element);
            }
        }
    }

    /**
     * Добавляет несколько элементов во множество
     *
     * @param $elements
     * @param bool|false $duplicate
     */
    public function addRange($elements, $duplicate = false)
    {
        if(is_array($elements) && count($elements)>1)
        {
            foreach($elements as $element)
            {
                if($duplicate)
                {
                    array_push($this->set, $element);
                }
                else
                {
                    if(!in_array($element, $this->set))
                    {
                        array_push($this->set, $element);
                    }
                }
            }
        }
    }

    /**
     * Удаляет элемент из множетсва (если одинаковых элементов несколько, удаляет все)
     *
     * @param $element
     *
     * @return bool
     */
    public function remove($element)
    {
        if(in_array($element, $this->set))
        {
            do
            {
                $key = array_search($element, $this->set);
                unset($this->set[$key]);
            }
            while($key !== false);
        }
        return false;
    }

    /**
     * Возвращает true, если множество содержит указанный элемент. В противном случае возвращает false
     *
     * @param $element
     *
     * @return bool
     */
    public function contains($element)
    {
        return in_array($element, $this->set) ? true : false;
    }

    /**
     * Возвращает количество элементов множества или 0, если множество пусто
     *
     * @return int
     */
    public function count()
    {
        return count($this->set);
    }

    /**
     * Возвращает итератор для перебора элементов множества
     *
     * @return array
     */
    public function GetEnumerator()
    {
        return $this->set;
    }

    /**
     * Возвращает множество, полученное операцией объединения его с указанным
     *
     * @param Set $set
     *
     * @return array
     */
    public function union(self $set)
    {
        $result = $this->set;
        foreach($set->set as $item)
        {
            if(!in_array($item, $this->set))
            {
                array_push($result, $item);
            }
        }
        return $result;
    }

    /**
     * Возвращает множество, полученное операцией пересечения его с указанным
     *
     * @param Set $set
     *
     * @return array
     */
    public function intersection(self $set)
    {
        return array_intersect($this->set,$set->set);
    }

    /**
     * Возвращает множество, являющееся разностью текущего с указанным
     *
     * @param Set $set
     *
     * @return array
     */
    public function difference(self $set)
    {
        $result = [];
        foreach($this->set as $item)
        {
            if(!in_array($item, $set->set))
            {
                array_push($result, $item);
            }
        }
        return $result;
    }

    /**
     * Возвращает множество, являющееся симметрической разностью текущего с указанным
     *
     * @param Set $set
     *
     * @return array
     */
    public function symmetric_difference(self $set)
    {
        return array_merge(array_diff($this->set, $set->set), array_diff($set->set, $this->set));
    }

    /**
     * проверяет, содержится ли одно множество целиком в другом
     *
     * @param Set $set
     *
     * @return bool
     */
    public function IsSubset(self $set)
    {
        if(count($set->set) == count($this->intersection($set)))
        {
            return true;
        }
        return false;
    }



    /**
     * Выводит элементы множества в виде строки
     */
    public function sprint()
    {
        $str = null;
        foreach($this->set as $item)
        {
            $str .= $item . ' ';
        }
        print($str . '<br>');
    }
}