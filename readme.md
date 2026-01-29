- https://symfony.com/bundles/ux-map/current/index.html
- composer require symfony/ux-map
- composer require symfony/ux-leaflet-map
- php bin/console make:controller Map
<br><br>
```php
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
```
<br>

```twig
// templates/map/index.twig.html

{% extends 'base.html.twig' %}

{% block title %}Hello MapController!{% endblock %}

{% block body %}
    {{ render_map(map, { style: 'height: 1080px' }) }}
{% endblock %}
```
