<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Marker;
use Symfony\UX\Map\Point;

final class MapController extends AbstractController
{
    #[Route('/map', name: 'app_map')]
    public function index(): Response
    {
        $map = (new Map())
            ->center(new Point( 50.81992,4.39766 )) // Centered on VUB
            ->zoom(13)
            ->addMarker(new Marker(new Point(50.81992,4.39766), 'VUB'))
            ->addMarker(new Marker(new Point(50.84585,4.35722), 'Brussels Central Station'))
        ;

        return $this->render('map/index.html.twig', [
            'map' => $map,
        ]);
    }
}
