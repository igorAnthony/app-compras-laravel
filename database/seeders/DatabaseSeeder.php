<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DateInterval;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Inserting users
        DB::table('users')->insert([
            ['name' => 'abc', 'email' => 'abc@gmail.com', 'password' => bcrypt('123456'), 'isAdmin' => 1],
            ['name' => 'Usuário', 'email' => 'usuario@gmail.com', 'password' => bcrypt('123456'), 'isAdmin' => 0],
            ['name' => 'Usuário 2', 'email' => 'usuario2@gmail.com', 'password' => bcrypt('123456'), 'isAdmin' => 0]
        ]);

        DB::table('addresses')->insert([
            [
                'user_id' => 1,
                'addressType' => 'Home',
                'contact_person_name' => 'abc',
                'contact_person_number' => '45991479103',
                'address' => 'Endereço 1',
                'latitude' => -24.73338696153586,
                'longitude' => -53.73685178225833
            ],
            [
                'user_id' => 1,
                'addressType' => 'Office',
                'contact_person_name' => 'abc',
                'contact_person_number' => '45991479103',
                'address' => 'Endereço 2',
                'latitude' => -24.7332639003158,
                'longitude' => -53.763438759517534
            ],
            [
                'user_id' => 2,
                'addressType' => 'Home',
                'contact_person_name' => 'abc',
                'contact_person_number' => '45991479103',
                'address' => 'Endereço 1',
                'latitude' => -24.73338696153586,
                'longitude' => -53.73685178225833
            ],
            [
                'user_id' => 3,
                'addressType' => 'Office',
                'contact_person_name' => 'abc',
                'contact_person_number' => '45991479103',
                'address' => 'Endereço 2',
                'latitude' => -24.7332639003158,
                'longitude' => -53.763438759517534
            ]
        ]);

        DB::table('categories')->insert([
            ['name' => 'Prato principal'],
            ['name' => 'Lanche'],
            ['name' => 'Acompanhamento'],
            // Adicione outras categorias aqui, se desejar
        ]);

        // Inserting products
        DB::table('products')->insert([
            [
                'name' => 'Feijoada',
                'description' => 'A feijoada é um prato tradicional da culinária brasileira, considerada uma das principais especialidades do país. É um cozido de feijão preto com uma variedade de carne de porco, como lombo, costelinha, linguiça e bacon. Também pode incluir outros cortes de carne, como orelha e pé de porco. O feijão é cozido lentamente com as carnes, resultando em um caldo rico e saboroso. A feijoada é geralmente servida com arroz branco, couve refogada, farofa, laranja e uma roda de samba. É um prato reconfortante e muito apreciado, sendo frequentemente servido em ocasiões especiais e em restaurantes especializados.',
                'id_category' => 1,
                'price' => 50,
                'image' => 'http://192.168.0.114:8000/storage/products/feijoada.jpg',
            ],
            [
                'name' => 'Cachorro quente paulista',
                'description' => 'O cachorro quente paulista é uma variação brasileira do clássico cachorro quente ou hot dog. Geralmente é montado com um pão de cachorro quente macio, uma salsicha cozida ou grelhada, e acompanhamentos como purê de batata, vinagrete (tomate, cebola e pimentão picados), milho, ervilha, maionese, ketchup e mostarda. Essa versão do cachorro quente é caracterizada por ser mais completo e incluir uma variedade de ingredientes, proporcionando uma combinação de sabores e texturas.',
                'id_category' => 2,
                'price' => 20,
                'image' => 'http://192.168.0.114:8000/storage/products/cachorroquente.jpg',
            ],
            [
                'name' => 'Maionese com pão de alho',
                'description' => 'A maionese com pão de alho é uma combinação deliciosa de acompanhamentos que é frequentemente servida em churrascos e churrasqueiras. A maionese é uma mistura cremosa feita com ovos, óleo e vinagre, enquanto o pão de alho é uma baguete ou pão italiano cortado em fatias, coberto com uma pasta de alho, manteiga e ervas. A maionese é usada como um mergulho para o pão de alho, adicionando um toque cremoso e saboroso ao pão já aromatizado com alho.',
                'id_category' => 3,
                'price' => 15,
                'image' => 'http://192.168.0.114:8000/storage/products/maionesepao.jpg',
            ],
            [
                'name' => 'Churrasco',
                'description' => 'O churrasco é um estilo de cozinha popular em muitas partes do mundo, especialmente no Brasil e na Argentina. Consiste em grelhar diferentes tipos de carne em fogo aberto ou em uma churrasqueira. Tradicionalmente, o churrasco inclui cortes de carne bovina, como picanha, costela e maminha, mas também pode incluir frango, linguiça, cordeiro e outros tipos de carne. O churrasco é conhecido por seu sabor defumado e suculento, resultado do lento processo de cozimento sobre brasas ou fogo.',
                'id_category' => 1,
                'price' => 200,
                'image' => 'http://192.168.0.114:8000/storage/products/churrasco.jpg',
            ],
            [
                'name' => 'Lasanha de berinjela',
                'description' => 'A lasanha de berinjela é uma variação da clássica lasanha italiana que substitui as camadas de massa por fatias finas de berinjela. É um prato vegetariano que geralmente inclui camadas de berinjela grelhada, molho de tomate, queijo e às vezes espinafre ou outros vegetais. A lasanha de berinjela é uma opção saudável e saborosa, pois a berinjela adiciona uma textura macia e um sabor único ao prato.',
                'id_category' => 1,
                'price' => 30,
                'image' => 'http://192.168.0.114:8000/storage/products/lasanha.jpg',
            ],
            [
                'name' => 'Pizza de calabresa',
                'description' => 'A pizza de calabresa é uma deliciosa opção de cardápio que consiste em uma base de massa de pizza coberta com molho de tomate, queijo derretido e fatias de calabresa defumada. A calabresa é um embutido de carne suína temperada com especiarias, proporcionando um sabor levemente picante e defumado. A pizza de calabresa é uma escolha clássica e popular em muitos lugares, sendo uma opção versátil e apreciada por muitas pessoas.',
                'id_category' => 1,
                'price' => 60,
                'image' => 'http://192.168.0.114:8000/storage/products/pizza.jpg',
            ]
        ]);

        // Inserting orders
        DB::table('orders')->insert([
            ['customer_id' => 1, 'total_amount' => 120, 'address_id' => 1],
            ['customer_id' => 2, 'total_amount' => 60, 'address_id' => 3],
            ['customer_id' => 1, 'total_amount' => 50, 'address_id' => 2],
            ['customer_id' => 3, 'total_amount' => 200, 'address_id' => 4],
            ['customer_id' => 1, 'total_amount' => 60, 'address_id' => 1],
            ['customer_id' => 2, 'total_amount' => 30, 'address_id' => 3],
            ['customer_id' => 1, 'total_amount' => 300, 'address_id' => 2],
            ['customer_id' => 1, 'total_amount' => 60, 'address_id' => 2],
            ['customer_id' => 1, 'total_amount' => 50, 'address_id' => 1],
            ['customer_id' => 1, 'total_amount' => 20, 'address_id' => 1],
            ['customer_id' => 1, 'total_amount' => 200, 'address_id' => 1],
            ['customer_id' => 1, 'total_amount' => 50, 'address_id' => 1],
        ]);
        $orderIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

        $startDateTime = Carbon::create(2023, 5, 1); // Definindo a data inicial em maio
        $intervalMinDays = 0; // Intervalo mínimo de dias
        $intervalMaxDays = 5; // Intervalo máximo de dias

        foreach ($orderIds as $orderId) {
            $interval = new DateInterval('P' . rand($intervalMinDays, $intervalMaxDays) . 'D'); // Gerando um intervalo aleatório
            $timestamp = $startDateTime->add($interval); // Adicionando o intervalo à data inicial
            DB::table('orders')
                ->where('id', $orderId)
                ->update(['created_at' => $timestamp]);
        }

        DB::table('orders_items')->insert([
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'total_price' => 100],
            ['order_id' => 1, 'product_id' => 2, 'quantity' => 1, 'total_price' => 20],
            ['order_id' => 2, 'product_id' => 3, 'quantity' => 3, 'total_price' => 60],
            ['order_id' => 3, 'product_id' => 1, 'quantity' => 1, 'total_price' => 50],
            ['order_id' => 4, 'product_id' => 4, 'quantity' => 1, 'total_price' => 200],
            ['order_id' => 5, 'product_id' => 5, 'quantity' => 1, 'total_price' => 60],
            ['order_id' => 6, 'product_id' => 6, 'quantity' => 1, 'total_price' => 30],
            ['order_id' => 8, 'product_id' => 6, 'quantity' => 5, 'total_price' => 250],
            ['order_id' => 8, 'product_id' => 1, 'quantity' => 1, 'total_price' => 50],
            ['order_id' => 9, 'product_id' => 3, 'quantity' => 4, 'total_price' => 60],
            ['order_id' => 10, 'product_id' => 1, 'quantity' => 1, 'total_price' => 50],
            ['order_id' => 11, 'product_id' => 2, 'quantity' => 1, 'total_price' => 200],
            ['order_id' => 12, 'product_id' => 1, 'quantity' => 1, 'total_price' => 50],
        ]);
       
    }
}
