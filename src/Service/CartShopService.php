<?php

namespace App\Service;

use App\Repository\PanierRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

/**
 * @var array $config
 */
class CartShopService
{
    private ?RequestStack $requestStack;
    private ?FlashBagInterface $flashBagInterface;

    public function __construct(RequestStack $requestStack, FlashBagInterface $flashBagInterface)
    {
        $this->requestStack = $requestStack;
        $this->flashBagInterface = $flashBagInterface;
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
        //$session->addFlash('sk-alert', 'Votre panier a été mis à jour');
        $this->flashBagInterface->flashBag->add('sk-alert', 'Votre panier a été mis à jour');


        $panier = $session->set('panier', $panier);
    }
}
