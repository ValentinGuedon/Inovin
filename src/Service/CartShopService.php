<?php

namespace App\Service;

use App\Repository\PanierRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class CartShopService
{
    private ?RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function addToCart(int $id, int $quantity): void
    {
        $session = $this->requestStack->getSession();

        // Création du panier
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id] = $panier[$id] + $quantity;
        } else {
            $panier[$id] = $quantity;
        }

        // Mise a jour du panier
        $session->getFlashBag()->add('sk-alert', 'Votre panier a été mis à jour'); /* @phpstan-ignore-line */

        $panier = $session->set('panier', $panier);
    }
}
