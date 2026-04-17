<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;
use App\Models\ProductDetail;
use App\Models\MaterialOption;
use App\Models\SizeOption;
use App\Models\ContactInfo;
use App\Models\CarouselSlide;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Hero Section
        HeroSection::create([
            'badge' => '✦ New Arrival 2025 ✦',
            'title_main' => 'Bridal',
            'title_highlight' => 'Gold',
            'subtitle' => '22K Hallmark Certified · Handcrafted Heritage',
            'cta_text' => 'Order Now',
        ]);

        // Seed Product Details
        ProductDetail::create([
            'product_name' => 'Maharani Bridal Necklace Set',
            'category' => 'Bridal Collection · 2025',
            'current_price' => 185000,
            'old_price' => 210000,
            'description' => 'Handcrafted by master artisans over 15 days, the Maharani Set is a celebration of heritage goldsmithing. Featuring intricate Kundan stonework, hand-set with natural ruby and polki diamonds. Each piece is hallmark certified and delivered in a premium gift box with authenticity certificate.',
            'gold_purity' => '22 Karat',
            'total_weight' => '~85 Grams',
            'stone_setting' => 'Kundan + Ruby',
            'includes' => 'Necklace + Earrings + Tikka',
            'certification' => 'BIS Hallmark',
            'delivery' => '5–7 Days',
        ]);

        // Seed Material Options
        MaterialOption::create([
            'icon' => '🏆',
            'name' => '22K Gold — 85g',
            'sub_text' => 'Full Set · Hallmarked',
            'price' => 185000,
            'sort_order' => 1,
        ]);

        MaterialOption::create([
            'icon' => '⭐',
            'name' => '22K Gold — 65g',
            'sub_text' => 'Necklace + Earrings',
            'price' => 145000,
            'sort_order' => 2,
        ]);

        MaterialOption::create([
            'icon' => '✨',
            'name' => '21K Gold — 65g',
            'sub_text' => 'Budget Bridal Option',
            'price' => 115000,
            'sort_order' => 3,
        ]);

        MaterialOption::create([
            'icon' => '💫',
            'name' => 'Gold-Plated — 90g',
            'sub_text' => 'Artificial / Imitation',
            'price' => 75000,
            'sort_order' => 4,
        ]);

        // Seed Size Options
        SizeOption::create([
            'size_name' => 'XS — Choker',
            'length_inches' => '14 – 15"',
            'length_cm' => '35 – 38 cm',
            'best_for' => 'Slim / XS neck',
            'style' => 'Choker / Close-fit',
            'sort_order' => 1,
        ]);

        SizeOption::create([
            'size_name' => 'S — Princess',
            'length_inches' => '16 – 17"',
            'length_cm' => '40 – 43 cm',
            'best_for' => 'Most women (S–M)',
            'style' => 'Collarbone length',
            'sort_order' => 2,
        ]);

        SizeOption::create([
            'size_name' => 'M — Matinee',
            'length_inches' => '18 – 20"',
            'length_cm' => '45 – 50 cm',
            'best_for' => 'Standard fit',
            'style' => 'Bust level',
            'sort_order' => 3,
        ]);

        SizeOption::create([
            'size_name' => 'L — Opera',
            'length_inches' => '24 – 28"',
            'length_cm' => '60 – 70 cm',
            'best_for' => 'Layering / Plus',
            'style' => 'Below bust',
            'sort_order' => 4,
        ]);

        SizeOption::create([
            'size_name' => 'XL — Rope',
            'length_inches' => '30" & above',
            'length_cm' => '76+ cm',
            'best_for' => 'Layered style',
            'style' => 'Multi-strand look',
            'sort_order' => 5,
        ]);

        SizeOption::create([
            'size_name' => 'Custom',
            'length_inches' => 'As requested',
            'length_cm' => 'As requested',
            'best_for' => 'Any requirement',
            'style' => 'Bespoke order',
            'sort_order' => 6,
        ]);

        // Seed Contact Info
        ContactInfo::create([
            'shop_address' => '123 Jewellers Lane, Nawabpur Road, Dhaka-1000',
            'shop_hours' => 'Sat–Thu, 10am – 8pm',
            'facebook_url' => 'https://facebook.com/YourPageName',
            'facebook_name' => 'Zara Gold Jewellers',
            'whatsapp_number' => '+880 1XX-XXXXXXX',
            'email' => 'info@zaragold.com',
            'brand_name' => 'Zara Gold',
            'tagline' => 'Heritage · Craft · Brilliance',
            'copyright' => '© 2025 Zara Gold Jewellers · All Rights Reserved · BIS Hallmark Certified',
        ]);

        // Seed Carousel Slides
        CarouselSlide::create([
            'icon' => '💎',
            'tag' => '✦ Front View',
            'caption' => 'Bridal Necklace Set — Full View',
            'image_path' => null,
            'sort_order' => 1,
        ]);

        CarouselSlide::create([
            'icon' => '✨',
            'tag' => '✦ Close Detail',
            'caption' => 'Intricate Kundan Stonework',
            'image_path' => null,
            'sort_order' => 2,
        ]);

        CarouselSlide::create([
            'icon' => '💍',
            'tag' => '✦ Earrings',
            'caption' => 'Matching Jhumka Earrings',
            'image_path' => null,
            'sort_order' => 3,
        ]);

        CarouselSlide::create([
            'icon' => '👑',
            'tag' => '✦ Complete Set',
            'caption' => 'Necklace + Earrings + Tikka',
            'image_path' => null,
            'sort_order' => 4,
        ]);
    }
}
