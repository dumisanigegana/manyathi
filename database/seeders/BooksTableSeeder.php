<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'id'             => 1,
                'title'          => 'The Book title',
                'subphase_id'   => 1,
                'author'        => 'Author',
                'path'        => 'book/sample.php',
                'price'         => 5.00,
                'description'    => 'Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.'
            ],
            
        ];

        Book::insert($books);
    }
}
