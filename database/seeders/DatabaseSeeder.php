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
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut vulputate arcu. Morbi nec fringilla odio. Sed viverra tristique eros, vitae ullamcorper ante consectetur a. Donec feugiat, erat quis gravida suscipit, libero sapien mattis purus, eget commodo nisi sem quis risus. Nullam facilisis pellentesque justo id varius. Ut nec metus ut libero tincidunt semper rhoncus sit amet leo. Pellentesque nunc quam, commodo aliquam nisl vitae, aliquet euismod nisl. Maecenas commodo vehicula lobortis. Cras nulla neque, sollicitudin non enim a, dignissim efficitur nisl. Maecenas euismod blandit nunc eu pretium. Sed eros risus, lacinia non dolor at, convallis vulputate sapien. Fusce efficitur pretium tortor, vel imperdiet arcu. Morbi pharetra nisi eu justo vehicula, a porta tortor dictum. Praesent hendrerit tristique mi quis pharetra. Sed gravida mi viverra, finibus lectus viverra, hendrerit nisi.',
                'id_category' => 1,
                'price' => 50,
                'stars' => 5,
                'location' => 'São Paulo'
            ],
            [
                'name' => 'Cachorro quente paulista',
                'description' => 'Sed pulvinar, nulla nec rutrum convallis, ex est molestie nunc, vitae fringilla tellus elit et ex. Etiam dignissim, metus quis ornare porta, nisi nisi placerat lorem, id cursus arcu libero ac dolor. Suspendisse volutpat eros nisi, nec ultrices justo scelerisque non. Curabitur sagittis maximus ex nec hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor, quam eget imperdiet facilisis, lacus leo sagittis elit, in posuere ligula nibh vel purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean consequat lectus vitae ex molestie, eget gravida ipsum maximus.',
                'id_category' => 2,
                'price' => 20,
                'stars' => 4,
                'location' => 'São Paulo'
            ],
            [
                'name' => 'Maionese com pão de alho',
                'description' => 'Cras rutrum dapibus est eu molestie. Vivamus pretium mi sed mollis tincidunt...',
                'id_category' => 3,
                'price' => 15,
                'stars' => 3,
                'location' => 'São Paulo'
            ],
            [
                'name' => 'Churrasco',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut vulputate arcu. Morbi nec fringilla odio. Sed viverra tristique eros, vitae ullamcorper ante consectetur a. Donec feugiat, erat quis gravida suscipit, libero sapien mattis purus, eget commodo nisi sem quis risus. Nullam facilisis pellentesque justo id varius. Ut nec metus ut libero tincidunt semper rhoncus sit amet leo.',
                'id_category' => 1,
                'price' => 200,
                'stars' => 4,
                'location' => 'São Paulo'
            ],
            [
                'name' => 'Lasanha de berinjela',
                'description' => 'Sed pulvinar, nulla nec rutrum convallis, ex est molestie nunc, vitae fringilla tellus elit et ex. Etiam dignissim, metus quis ornare porta, nisi nisi placerat lorem, id cursus arcu libero ac dolor. Suspendisse volutpat eros nisi, nec ultrices justo scelerisque non. Curabitur sagittis maximus ex nec hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor, quam eget imperdiet facilisis, lacus leo sagittis elit, in posuere ligula nibh vel purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean consequat lectus vitae ex molestie, eget gravida ipsum maximus.',
                'id_category' => 1,
                'price' => 30,
                'stars' => 2,
                'location' => 'São Paulo'
            ],
            [
                'name' => 'Pizza de calabresa',
                'description' => 'Cras rutrum dapibus est eu molestie. Vivamus pretium mi sed mollis tincidunt. Donec elementum vulputate metus, vehicula scelerisque enim ultricies non. Suspendisse imperdiet dui at egestas eleifend. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
                'id_category' => 1,
                'price' => 60,
                'stars' => 5,
                'location' => 'São Paulo'
            ]
        ]);

        // Inserting orders
        DB::table('orders')->insert([
            ['customer_id' => 1, 'total_amount' => 120],
            ['customer_id' => 2, 'total_amount' => 60],
            ['customer_id' => 1, 'total_amount' => 50],
            ['customer_id' => 3, 'total_amount' => 200],
            ['customer_id' => 1, 'total_amount' => 60],
            ['customer_id' => 2, 'total_amount' => 30],
            ['customer_id' => 1, 'total_amount' => 300],
            ['customer_id' => 1, 'total_amount' => 60],
            ['customer_id' => 1, 'total_amount' => 50],
            ['customer_id' => 1, 'total_amount' => 20],
            ['customer_id' => 1, 'total_amount' => 200],
            ['customer_id' => 1, 'total_amount' => 50],
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
