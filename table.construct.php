<?php

class Table
{
    private $state;

    function __construct()
    {
        $this->state = 0;
        print "<table>";
    }

    function __destruct()
    {
        print "</table>";
    }

    function print_row($row)
    {
        if($this->state & 1)
        {
            $row_color = 'row2';
        }
        else
        {
            $row_color = 'row1';
        }

        print "<tr class='$row_color'>";

        foreach($row as $value)
        {
            print "<td>$value</td>";
        }

        print "</tr>";
        $this->state++;
    }
}

$mas_row = ['string_1', 'string_2', 'string_3', 'string_4', 'string_5'];

$i=0;
$mytable = new Table();

while($i<21)
{
    $mytable->print_row($mas_row);
    $i++;
}

unset($mytable);

?>

<style>
    tr.row1{
        background-color: #255625;
    }

    tr.row2{
        background-color: #204d74;
    }
</style>

