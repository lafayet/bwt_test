<?php 

namespace BwtTest\Views;

class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.
    
    function generate($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */
        
        include 'vendor/dmitry/src/BwtTest/Views/'.$template_view;
    }
}