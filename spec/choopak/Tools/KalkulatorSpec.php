<?php

namespace spec\choopak\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KalkulatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('choopak\Tools\Kalkulator');
    }
     function it_should_have_setter_and_gettter()
    {
        $this->setA(123)->getA()->shouldReturn(123);
        $this->setB(987)->getB()->shouldReturn(987);
    }
    function it_should_calculate_add()
    {
    $this->setA(5)->setB(7)->add()->shouldReturn(12);
    }
}
