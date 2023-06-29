<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LexiqueController extends AbstractController
{
    #[Route('/lexique', name: 'app_lexique')]
    public function lexique(): Response
    {
        $lexique = [
            'A' => [
                'Acerbe' => 'Qui est d\'un goût aigre et âpre. Se dit d\'un vin acide, dur et âpre. 
                Goût mordant souvent lié à une note végétale 
                (macération de rafles vertes en vinification rouge), vendange peu mûre.',
                'Acidité' => 'Le vin est une boisson alcoolisée et acidulée. 
                L\'acidité est un élément essentiel du vin. 
                Elle est présente dans le raisin, elle participe à donner de
                la fraîcheur et de la vigueur au vin, en excès, elle donne de la verdeur. 
                Si le vin manque d\'acidité, on dit qu\'il est mou.',
                'Alcooleux' => 'Se dit d\'un vin qui par un excès d\'alcool 
                rend un vin légèrement déséquilibré. 
                Pour gommer le coté chaleur (thermique) nous prendrons la précaution 
                de servir le vin 1 à 2 degrés plus bas qu\'à l\'habitude.',
                'Ample' => 'Se dit d\'un vin qui occupe pleinement et longuement 
                la bouche avec les caractéristiques tactiles d\'un tissu confortable.',
                'A.O.C' => 'Appellation d’origine contrôlée. 
                Désigne des produits répondant aux critères de l\'AOP 
                et protège la dénomination sur le territoire français. 
                Elle constitue une étape vers l\'AOP, désormais signe européen.',
                'Apre' => 'Sensation de dureté, de râpe, d\'astringence provoquée 
                en bouche par des tanins en excès ou de mauvaise qualité.',
                'Aqueux' => 'Vin dilué donnant l\'impression
                de peu de matière et d\'une liquidité aqueuse.',
                'Arôme' => 'Odeur(s) d\'un vin. 
                On distingue les arômes primaires (propres au cépage),
                secondaires (provenant de la fermentation) 
                et tertiaires (liés à l\'évolution du vin en milieu réducteur)',
            ],

            'B' => [
                'Blanc de blancs' => 'Le Blanc de Blancs, ou Blanc de Blanc, 
                est un vin effervescent produit exclusivement avec des raisins blancs. 
                Cette dénomination tient son origine dans la couleur du 
                champagne obtenue à partir de raisins blancs, généralement du chardonnay.',
                'Blanc de noirs' => 'Le blanc de noirs est un vin blanc produit 
                avec des raisins rouges ou noirs, à jus blanc. 
                Les champagnes utilisent cette dénomination pour les vins issus
                exclusivement des cépages pinot noir ou pinot meunier ou les deux en assemblage. 
                Ils sont caractérisés par la force du premier et/ou le fruité du second (ex: pinot).',
                'Botrytisé' => 'Se dit d\'un vin issu de raisins affectés 
                par la pourriture noble, c\'est à dire par 
                la forme la plus bénéfique du Botrytis.
                Les vins botrytisés sont dits liquoreux.',
                'Bouquet' => 'Le bouquet d\'un vin désigne 
                la richesse olfactive d\'un vin à maturité. 
                Le bouquet met du temps à se construire en bouteille, 
                et il est rapidement détruit par exposition à l\'air. ',
            ],

            'C' => [
                'Caudalie' => 'Unité de mesure de la persistance 
                aromatique (1 caudalie = 1 seconde). 
                C\'est à dire le nombre de secondes pendant 
                lesquelles après avoir avalé ou craché le vin, 
                il donne encore une impression complète en bouche.',
                'Cépage' => 'Plant de vigne, « variété » de raisin.
                Identité de chaque variété de raisins, 
                on distingue les raisins de table consommés en l\'état, 
                les raisins de cuve permettant d\'élaborer un vin.',
                'Chai' => 'Local où se déroulent les vinifications et/ou l’élevage du vin.',
                'Chair' => 'La description de la chair correspond 
                à la consistance de la matière du vin.
                On attend d\'un vin de « qualité » que sa matière, sa chair, 
                soit harmonieuse et équilibrée par 
                rapport à sa charpente, à son squelette, et à sa puissance.',
                'Chambrer' => 'Porter un vin à la température de la pièce.',
                'Charpenté' => 'Vin solidement construit, riche en alcool, tanins et acidité.',
                'Chaud' => 'Se dit d\'un vin où la sensation alcoolique domine.',
                'Collage' => 'Opération consistant à faire précipiter dans une cuve ou 
                une barrique des particules en suspension jugées indésirables dans le vin.
                On emploie pour cela du blanc d\'œuf, de la caséine...',
                'Coulure' => 'Non-transformation de la fleur de 
                vigne en fruit en raison d\'une mauvaise fécondation, 
                pouvant s\'expliquer par des raisons diverses (climatiques, physiologiques).',
            ],

            'D' => [
                'Débourbage' => 'Opération consistant à éliminer 
                les particules solides (pépins, morceaux de rafle...) 
                grossières avant d\'entamer la fermentation d\'un vin blanc.',
                'Décantation' => 'Transvasement du vin dans un nouveau 
                récipient (carafe) pour éliminer le dépôt.',
                'Dégorgement' => 'Élimination du dépôt accumulé dans le goulot d\'une bouteille de champagne.',
                'Dormance' => 'Période hivernale, lorsque 
                les premiers froids (fin de l\'automne et début de l\'hiver) endorment la vigne. 
                C\'est la période favorable pour effectuer la taille.',
            ],
            'E' => [
                'Effeuillage' => 'Pratique consistant à ôter les feuilles situées autour des grappes 
                de façon à leur permettre une meilleure exposition au soleil et au vent.',
                'Egrappage' => 'Élimination des rafles avant la mise en cuve de la vendange.',
                'Elevage' => 'Opérations diverses effectuées 
                sur le vin entre la fin de la fermentation et la mise en bouteille.',
                'Event' => 'Goût altéré par le contact avec l\'air. 
                Fréquent après la mise en bouteille.',
            ],

            'F' => [
                'Fermentation alcoolique' => 'Transformation du sucre contenu dans 
                le raisin en alcool sous l’effet des levures. 
                Cette opération entraîne le dégagement de gaz carbonique.',
                'Flaveur' => 'Ensemble des perceptions gustatives et olfactives.',
                'Foulage' => 'Éclatement des grain de raisins avant leur mise en cuve. 
                Le foulage se faisait autrefois au pied.',
                'Fragrances' => 'Parfums, arômes.',
            ],
            'G' => [
                'Gravelle' => 'Nom donné au dépôt de tartre au fond d\'une bouteille.',

            ],
            'H' => [
                'Hybride' => 'Cépage obtenu par croisement d\'autres cépages.',
                'Hygrométrie' => 'C\'est la mesure du taux d\'humidité à l\'aide d\'un hygromètre. 
                Le taux idéal d\'hygrométrie se situant entre 70 et 90% dans une cave à vin.',
            ],

            'L' => [
                'Levures' => 'Micro-organismes transformant le sucre en alcool.',
                'Lies' => 'Dépôt fin de couleur jaunâtre se déposant au fond des barriques. 
                On les élimine par soutirage.',
            ],
            'M' => [
                'Madérisé' => 'Se dit d\'un vin oxydé, c\'est à dire ayant 
                subi un long contact avec l\'oxygène 
                (arômes caractéristiques de noix, pomme verte...).',
                'Marc' => 'Ce qui reste de la vendange (peaux, pépins...) 
                après vinification et pressurage.',
                'Méchage' => 'Action de brûler des mêches de soufre 
                dans une barrique pour la stériliser avant d\'y mettre du vin.',
                'Mildiou' => 'Champignon microscopique s\'attaquant à la 
                face interne des feuilles de vignes.
                Elles finissent par tomber. On lutte contre le mildiou 
                avec la bouillie bordelaise (mélange de chaux et de cuivre).',
                'Millésime' => 'Année de récolte du raisin (et donc d’élaboration du vin).',
                'Mistelle' => 'Boisson composée d\'eau de vie et de 
                jus de raisin frais ou à peine fermenté (ex: pineau des Charentes).',
                'Modes culturales' => 'Choix de techniques agricoles
                dans le domaine de la culture de la vigne, tailles, fumure des sols…',
                'Mou' => 'Se dit d\'un vin manquant d\'acidité.',
                'Moût' => 'Jus du raisin non fermenté. Constitué 
                d\'éléments solides (fragments de peaux ou pellicule, de rafles) 
                et d\'éléments liquides (eau, sucres, acides, etc.). 
                Il est la base du futur vin.',
                'Mutage' => 'Le mutage a pour but de conserver au moût 
                une partie de ses sucres en arrêtant 
                la fermentation alcoolique par addition d\'alcool neutre. 
                Le mot vient du terme muter signifiant rendre muet en vieux français, 
                car l\'opération stoppe également le bruit caractéristique de la fermentation.',
            ],

            'N' => [
                'Nerveux' => 'Se dit d\'un vin présentant une certaine acidité.',
            ],

            'O' => [
                'Oenologue' => 'Technicien du vin dont les connaissances 
                sont sanctionnées par un diplôme national, 
                le D.N.O. Ce mot est souvent utilisé à tort, et confondu 
                avec œnophile (amateur de vin) voire d\'autres professions du vin comme 
                sommelier par exemple.',
                'Organoleptique' => 'Étude des qualités d\'un vin, de sa robe, de ses arômes et de sa structure. 
                L\'examen organoleptique fait appel aux sens de la vue, de l\'odorat et du goût.',
            ],
            'P' => [
                'Perlant' => 'Présence discrète de gaz carbonique provoquant 
                une légère effervescence (dans le muscadet-sur-lie ou le gaillac perlé par exemple).',
                'Phénolique' => 'Composant du vin (tanins, matières colorantes...)
                jouant un rôle déterminant dans la couleur,
                l\'astringence et la composition aromatique d\'un vin.',
                'Pigeage' => 'Opération consistant à brasser une cuve 
                pendant la fermentation afin de bien mélanger peaux et jus.',
            ],
            'R' => [
                'Pourriture noble' => 'Elle est produite par le fameux champignon botrytis cinerea, 
                qui dans des conditions idéales transforme les grains 
                en apparence comme en profondeur et fait naître les plus grands vins liquoreux.',
                'Rafle' => 'Pédoncule (queue) de la grappe de raisin.',
            ],

            'S' => [
                'Saignée' => 'Technique de vinification du vin rosé consistant 
                à écouler une partie du jus de goutte pour obtenir un rosé léger.',
                'Sommelier' => 'Responsable des vins dans un restaurant.',
                'Soutirage' => 'Désigne l\'action de transvaser le vin d\'un 
                récipient à un autre, de façon à éliminer les dépôts.',
            ],
            'T' => [
                'Tanin' => 'Composant du raisin, présent dans la peau, la rafle, les pépins. 
                En excès dans un vin, responsable de l’astringence.',
                'Tranquille' => 'Se dit d\'un vin non effervescent.',
                'Tuilé' => 'Teinte d\'un vin rouge évolué qui tire vers l\'orangé.',
            ],
            'V' => [
                'Véraison' => 'Étape du cycle végétatif de la 
                vigne qui voit les pellicules de raisins acquérir 
                leur couleur bleutée (vin rouge) ou jaune (vin blanc). Se produit en août.',
                'Vif' => 'Vin présentant une acidité rafraîchissante.',
                'Vin' => 'Le vin est le résultat de la fermentation 
                alcoolique du moût ou jus de raisin frais et ou concentré.',
                'Vineux' => 'Se dit d\'un vin riche en alcool.',
                'Vinicole' => 'Ce qui a trait à l\'élaboration du vin (Vini et non pas vignicole).',
                'Viticole' => 'Ce qui a trait à la culture de la vigne.',
            ],
        ];


        return $this->render('lexique/index.html.twig', [
            'lexique' => $lexique,

        ]);
    }
}
