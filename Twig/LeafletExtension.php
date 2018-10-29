<?php

namespace CNT\LeafletjsBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Twig_SimpleFunction;
use Twig\Twig_Environment;

class LeafletExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('displaysimplemap', [$this, 'displaymapSimpleFunction'], [
                'is_safe' => ['html'],
                'needs_environment' => true,
            ])
        ];
    }
    
    public function displaymapSimpleFunction(Twig_Environment $environment, $mapname, array $points, array $options = array())
    {
        if(!$options['view']) {
            $options['view'] = [
                'long' => $points[0].longitude,
                'lat' => $points[0].latitude,
                'zoom' => 12,
                'findbest' => true,
            ];
        }
        return $environment->render('CNTLeafletjsBundle:Map:displaymap.html.twig', array(
            'mapname' => $mapname,
            'view' => $options['view'],
            'points' => $points,
            'options' => $options,
        ));
    }
}
