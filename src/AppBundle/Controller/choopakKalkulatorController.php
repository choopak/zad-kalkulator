<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\choopakKalkulatorType;
use choopak\Tools\Kalkulator;
class choopakKalkulatorController extends Controller
{
    /**
     * @Route("/choopak/kalkulator/show/form", name="choopak_kalkulator_show_form")
     */
    public function showFormAction()
    {
        $kalkulator = new Kalkulator();
        $form = $this->createCreateForm($kalkulator);
        return $this->render(
            'AppBundle:choopakKalkulator:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * @Route("/choopak/kalkulator/calc", name="choopak_kalkulator_wynik")
     * @Method("POST")
     */
    public function calculateAction(Request $request)
    {
        $kalkulator = new Kalkulator();
        $form = $this->createCreateForm($kalkulator);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->render(
                'AppBundle:choopakKalkulator:wynik.html.twig',
                array('wynik' => $kalkulator->add())
            );
        }
        return $this->render(
            'AppBundle:choopakKalkulator:form.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
    /**
     * Creates a form...
     *
     * @param Kalkulator $kalkulator The object
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Kalkulator $kalkulator)
    {
        $form = $this->createForm(new choopakKalkulatorType(), $kalkulator, array(
            'action' => $this->generateUrl('choopak_kalkulator_wynik'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Oblicz'));
        return $form;
    }
}