<?php
// Product Table Seeder To Populate Table
use App\Product;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$now = Carbon::now()->toDateTimeString();
        // SQL Insert
        //  Electronics
        Product::create([
            'name' => 'Laptop ',
            'slug' => 'laptop-',
            'details' =>  ' TB SSD, 32GB RAM',
            'price' => 5999,
            'description' => 'ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            'image' => 'product-images/electronics/laptop.jpg'
        ])->categories()->attach(1);
        Product::create([

            'name' => '42" LG HDTV',
            'slug' => 'lg42Hdtv',
            'details' => '42" 1080p LCD TV - 16:9 - HDTV',
            'price' => 4999.95,
            'description' => 'Whatever room, whatever light, LGs 42 CS560 LCD television adjusts its picture to look crisp, clear, and glare-free! Its sharp pixel resolution at 1920 x 1080p yields a detailed picture while its fast refresh rate at 60 Hz ensures you wont miss a play in the basketball game. Surround sound matches that quality picture with quality sound. ',
            'featured' => 1,
            'image' => 'product-images/electronics/hdtv.jpg'

        ])->categories()->attach(1);
        Product::create([

            'name' => 'Zef Speaker System',
            'slug' => 'zefSpeaker',
            'details' => 'Zef deluxe Speaker System',
            'price' => 2999.95,
            'description' => 'Model: T-1  Zef Speaker System 2.2 Ch 1000W PMPO 1 Year Guarantee.',
            'featured' => 1,
            'image' => 'product-images/electronics/zefSpeakerSystem.png'

        ])->categories()->attach(1);
        Product::create([

            'name' => 'Apple iPod Touch 8GB',
            'slug' => 'ipod8gb',
            'details' => 'Apple iPod Touch 8GB (4th Generation) - Black',
            'price' => 1999.95,
            'description' => 'The world\'s most popular portable gaming device is even more fun. Now available in black and white, iPod touch includes iOS 5 with over 200 new features, like iMessage, Notification Center, and Twitter integration. Send free, unlimited text messages over Wi-Fi with iMessage. Record HD video and make FaceTime calls. Visit the App Store to choose from over 500,000 apps. iPod touch also features iCloud, which stores your music, photos, apps, and more.',
            'featured' => 1,
            'image' => 'product-images/electronics/ipadTouchMini.jpg'
        ])->categories()->attach(1);

        // Apparel
        Product::create([

            'name' => '14K Diamond Ring',
            'slug' => 'diamondRing',
            'details' => 'Round Diamond Solitaire Ring in 14K White Gold',
            'price' => 6999.95,
            'description' => 'Say I love you with this stunning piece that will stun you if you are not careful. ',
            'featured' => 1,
            'image' => 'product-images/apparel/ring.jpg'
        ])->categories()->attach(2);
        Product::create([

            'name' => 'Zef Shirt',
            'slug' => 'zefShirt',
            'details' => 'The Zef T-Shirt!',
            'price' => 29.95,
            'description' => 'This KIEF shirt could make you the most popular kid on the block!',
            'featured' => 1,
            'image' => 'product-images/apparel/tShirt.jpg'
        ])->categories()->attach(2);
        Product::create([
            'name' => 'Socks',
            'slug' => 'socks',
            'details' => 'White Socks 4 Pack',
            'price' => 121.95,
            'description' => 'This sock has cushioned sole for extra comfort with comfortable stay-up top. Our patented technology means quality you can trust.',
            'featured' => 1,
            'image' => 'product-images/apparel/socks.jpg'
        ])->categories()->attach(2);

        // Entertainment
        Product::create([

            'name' => 'Movie Speaker System',
            'slug' => 'movieSpeaker',
            'details' => 'Movie Theatre quality sound in your home!',
            'price' => 2999.95,
            'description' => 'Model: T-1  Zef Speaker System 2.2 Ch 1000W PMPO 1 Year Guarantee',
            'featured' => 1,
            'image' => 'product-images/electronics/zefSpeakerSystem.png'
        ])->categories()->attach(3);
        Product::create([

            'name' => 'Generic Movie',
            'slug' => 'movie',
            'details' => 'Movie',
            'price' => 99.95,
            'description' => 'The most generic meta-movie you\'ll ever watch. Inspired by every drama movie ever made.',
            'featured' => 1,
            'image' => 'product-images/entertainement/genericMovie.png'
        ])->categories()->attach(3);
        // Toys
        Product::create([

            'name' => 'Beach Ball',
            'slug' => 'beachBall',
            'details' => 'Its round, colorful and full of air!.',
            'price' => 19.95,
            'description' => 'Branded 12 inch Beach Ball. Multicolor vinyl ball for Beach and outdoor play. ',
            'featured' => 1,
            'image' => 'product-images/toys/beachBall.jpg'
        ])->categories()->attach(4);
        Product::create([

            'name' => 'Hula Hoop',
            'slug' => 'hulaHoop',
            'details' => 'Hulaaaa Hooooop!',
            'price' => 19.95,
            'description' => 'Let it go around and around!',
            'featured' => 1,
            'image' => 'product-images/toys/hulaHoop.jpg'
        ])->categories()->attach(4);
        Product::create([

            'name' => 'Kite',
            'slug' => 'kite',
            'details' => 'If there is wind you can fly it!',
            'price' => 99.95,
            'description' => 'Made from high quality materials, tested for optimal flight.',
            'featured' => 1,
            'image' => '/product-images/toys/Kite.jpg'
        ])->categories()->attach(4);
        // Food
        Product::create([

            'name' => 'Lemon Chicken',
            'slug' => 'lemonChicken',
            'details' => 'Boneless, skinless chicken breast cutlets marinated in a delicious lemon herbal sauce.',
            'price' => 45.95,
            'description' => 'Cooking Instructions (From frozen): Grill or saute approximately 6 minutes per side or bake 25 minutes at 400°.',
            'featured' => 1,
            'image' => 'product-images/food/lemonChicken.jpg'
        ])->categories()->attach(5);

        // Books
        Product::create([

            'name' => 'The Lion, the Witch and the Wardrobe',
            'slug' => 'bookTheLion',
            'details' => 'The Lion, the Witch and the Wardrobe 1999 4th edition',
            'price' => 92.95,
            'description' => 'They open a door and enter a world.. ',
            'featured' => 1,
            'image' => 'product-images/books/lionWitch.jpg'
        ])->categories()->attach(6);

        // Furniture
        Product::create([

            'name' => 'Desk Lamp',
            'slug' => 'deskLamp',
            'details' => '42" 1080p LCD TV - 16:9 - HDTV',
            'price' => 35.45,
            'description' => 'Product materials: Shade: Paper Tube/ Base plate: Steel, Brush finish nickel-plated, Clear lacquer.',
            'featured' => 1,
            'image' => 'product-images/furniture/deskLamp.jpg'
        ])->categories()->attach(7);

        // Stationery
        Product::create([

            'name' => 'Ball Point Pen',
            'slug' => 'pen',
            'details' => 'Ball Point Pens (7 pack)',
            'price' => 21.95,
            'description' => 'A pen can be mightier than a sword! Start writing today.',
            'featured' => 1,
            'image' => 'product-images/stationery/ballPointPens.jpg'
        ])->categories()->attach(8);

        Product::create([
            'name' => 'Paper Roll',
            'slug' => 'paperRoll',
            'details' => 'Thick paper roll',
            'price' => 9.95,
            'description' => 'High quality paper made from real trees!',
            'featured' => 1,
            'image' => 'product-images/stationery/paperRoll.jpg'
        ])->categories()->attach(8);

        // Flowers
        Product::create([
            'name' => 'Roses',
            'slug' => 'roses',
            'details' => 'Beautiful roses to brighten anyones day!',
            'price' => 19.95,
            'description' => 'Handpicked, professionully decorated!',
            'featured' => 1

        ])->categories()->attach(9);
    }
}
