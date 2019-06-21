<?php

use App\Categorie;
use App\Product;
use App\Size;
use Illuminate\Database\Seeder;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création des catégories
        Categorie::create([ 'title' => 'Homme' ]);
        Categorie::create([ 'title' => 'Femme' ]);
        
        // Création des tailles
        Size::create([ 'name' => 'XS' ]);
        Size::create([ 'name' => 'S' ]);
        Size::create([ 'name' => 'M' ]);
        Size::create([ 'name' => 'L' ]);
        Size::create([ 'name' => 'XL' ]);

        // Création de 80 produits
        factory(Product::class, 80)->create()->each(function( $product ){
        
            // Association aléatoire d'une catégorie à un produit 
            $randomCategorie = rand(1, 2);
            $categorie = Categorie::find($randomCategorie);
            $product->categorie()->associate($categorie);

            switch ($randomCategorie) {
                case 1: $path = 'hommes';
                    break;
                case 2: $path = 'femmes';
                    break;
                default:
            }
            
            // Génération alétoire d'une image issue du dossier transmis
            $images = glob(public_path() . '/images/' . $path . '/*');
            $randomImage = $images[array_rand($images)];
            $product->url_image = $path . '/' . basename($randomImage);
            
            // Génération aléatoires des tailles pour chaque produit
            $sizes = Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all();
            $product->size()->attach($sizes);
            $product->save();
        });
    }
}
