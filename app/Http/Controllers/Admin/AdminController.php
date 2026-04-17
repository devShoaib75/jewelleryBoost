<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\ProductDetail;
use App\Models\MaterialOption;
use App\Models\SizeOption;
use App\Models\ContactInfo;
use App\Models\CarouselSlide;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        $orderStats = Order::countByStatus();
        
        return view('admin.dashboard', [
            'heroCount' => HeroSection::count(),
            'productCount' => ProductDetail::count(),
            'materialCount' => MaterialOption::count(),
            'sizeCount' => SizeOption::count(),
            'contactCount' => ContactInfo::count(),
            'carouselCount' => CarouselSlide::count(),
            'totalOrders' => Order::count(),
            'pendingOrders' => $orderStats['pending'],
            'confirmedOrders' => $orderStats['confirmed'],
            'orderStats' => $orderStats,
        ]);
    }

    // ╔════════════════════════════════════════════════════════╗
    // ║ HERO SECTION MANAGEMENT
    // ╚════════════════════════════════════════════════════════╝

    public function editHero()
    {
        $hero = HeroSection::getActive();
        return view('admin.sections.hero', compact('hero'));
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'badge' => 'required|string|max:255',
            'title_main' => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'cta_text' => 'required|string|max:255',
        ]);

        $hero = HeroSection::first() ?? new HeroSection();
        $hero->fill($validated)->save();

        return redirect()->route('admin.hero.edit')->with('success', 'Hero section updated successfully!');
    }

    // ╔════════════════════════════════════════════════════════╗
    // ║ PRODUCT DETAILS MANAGEMENT
    // ╚════════════════════════════════════════════════════════╝

    public function editProduct()
    {
        $product = ProductDetail::getActive();
        return view('admin.sections.product', compact('product'));
    }

    public function updateProduct(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'current_price' => 'required|numeric|min:0',
            'old_price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'gold_purity' => 'required|string|max:255',
            'total_weight' => 'required|string|max:255',
            'stone_setting' => 'required|string|max:255',
            'includes' => 'required|string|max:255',
            'certification' => 'required|string|max:255',
            'delivery' => 'required|string|max:255',
        ]);

        $product = ProductDetail::first() ?? new ProductDetail();
        $product->fill($validated)->save();

        return redirect()->route('admin.product.edit')->with('success', 'Product details updated successfully!');
    }

    // ╔════════════════════════════════════════════════════════╗
    // ║ MATERIAL OPTIONS MANAGEMENT
    // ╚════════════════════════════════════════════════════════╝

    public function indexMaterial()
    {
        $materials = MaterialOption::getAll();
        return view('admin.sections.material-index', compact('materials'));
    }

    public function createMaterial()
    {
        return view('admin.sections.material-form');
    }

    public function storeMaterial(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'sub_text' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'required|integer|min:1',
        ]);

        MaterialOption::create($validated);
        return redirect()->route('admin.material.index')->with('success', 'Material option created!');
    }

    public function editMaterial($id)
    {
        $material = MaterialOption::findOrFail($id);
        return view('admin.sections.material-form', compact('material'));
    }

    public function updateMaterial(Request $request, $id)
    {
        $material = MaterialOption::findOrFail($id);
        $validated = $request->validate([
            'icon' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'sub_text' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'required|integer|min:1',
        ]);

        $material->update($validated);
        return redirect()->route('admin.material.index')->with('success', 'Material option updated!');
    }

    public function deleteMaterial($id)
    {
        MaterialOption::findOrFail($id)->delete();
        return redirect()->route('admin.material.index')->with('success', 'Material option deleted!');
    }

    // ╔════════════════════════════════════════════════════════╗
    // ║ SIZE OPTIONS MANAGEMENT
    // ╚════════════════════════════════════════════════════════╝

    public function indexSize()
    {
        $sizes = SizeOption::getAll();
        return view('admin.sections.size-index', compact('sizes'));
    }

    public function createSize()
    {
        return view('admin.sections.size-form');
    }

    public function storeSize(Request $request)
    {
        $validated = $request->validate([
            'size_name' => 'required|string|max:255',
            'length_inches' => 'required|string|max:255',
            'length_cm' => 'required|string|max:255',
            'best_for' => 'required|string|max:255',
            'style' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:1',
        ]);

        SizeOption::create($validated);
        return redirect()->route('admin.size.index')->with('success', 'Size option created!');
    }

    public function editSize($id)
    {
        $size = SizeOption::findOrFail($id);
        return view('admin.sections.size-form', compact('size'));
    }

    public function updateSize(Request $request, $id)
    {
        $size = SizeOption::findOrFail($id);
        $validated = $request->validate([
            'size_name' => 'required|string|max:255',
            'length_inches' => 'required|string|max:255',
            'length_cm' => 'required|string|max:255',
            'best_for' => 'required|string|max:255',
            'style' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:1',
        ]);

        $size->update($validated);
        return redirect()->route('admin.size.index')->with('success', 'Size option updated!');
    }

    public function deleteSize($id)
    {
        SizeOption::findOrFail($id)->delete();
        return redirect()->route('admin.size.index')->with('success', 'Size option deleted!');
    }

    // ╔════════════════════════════════════════════════════════╗
    // ║ CONTACT INFO MANAGEMENT
    // ╚════════════════════════════════════════════════════════╝

    public function editContact()
    {
        $contact = ContactInfo::getActive();
        return view('admin.sections.contact', compact('contact'));
    }

    public function updateContact(Request $request)
    {
        $validated = $request->validate([
            'shop_address' => 'required|string',
            'shop_hours' => 'required|string|max:255',
            'facebook_url' => 'required|url',
            'facebook_name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:255',
            'email' => 'required|email',
            'brand_name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'copyright' => 'required|string',
        ]);

        $contact = ContactInfo::first() ?? new ContactInfo();
        $contact->fill($validated)->save();

        return redirect()->route('admin.contact.edit')->with('success', 'Contact information updated successfully!');
    }

    // ╔════════════════════════════════════════════════════════╗
    // ║ CAROUSEL MANAGEMENT
    // ╚════════════════════════════════════════════════════════╝

    public function indexCarousel()
    {
        $slides = CarouselSlide::getAll();
        return view('admin.sections.carousel-index', compact('slides'));
    }

    public function createCarousel()
    {
        return view('admin.sections.carousel-form');
    }

    public function storeCarousel(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:10',
            'tag' => 'required|string|max:255',
            'caption' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'sort_order' => 'required|integer|min:1',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('carousel', 'public');
        }

        CarouselSlide::create($validated);
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide created!');
    }

    public function editCarousel($id)
    {
        $slide = CarouselSlide::findOrFail($id);
        return view('admin.sections.carousel-form', compact('slide'));
    }

    public function updateCarousel(Request $request, $id)
    {
        $slide = CarouselSlide::findOrFail($id);
        $validated = $request->validate([
            'icon' => 'required|string|max:10',
            'tag' => 'required|string|max:255',
            'caption' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'sort_order' => 'required|integer|min:1',
        ]);

        // Handle image upload - delete old image if new one is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($slide->image_path && Storage::disk('public')->exists($slide->image_path)) {
                Storage::disk('public')->delete($slide->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('carousel', 'public');
        }

        $slide->update($validated);
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide updated!');
    }

    public function deleteCarousel($id)
    {
        $slide = CarouselSlide::findOrFail($id);
        
        // Delete image file if it exists
        if ($slide->image_path && Storage::disk('public')->exists($slide->image_path)) {
            Storage::disk('public')->delete($slide->image_path);
        }
        
        $slide->delete();
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide deleted!');
    }

    // ╔════════════════════════════════════════════════════════╗
    // ║ ORDER MANAGEMENT
    // ╚════════════════════════════════════════════════════════╝

    /**
     * Show all orders with filters
     */
    public function indexOrders($status = 'all')
    {
        if ($status === 'all') {
            $orders = Order::getAll();
        } else {
            $orders = Order::getByStatus($status);
        }
        
        $stats = Order::countByStatus();
        return view('admin.sections.orders-index', compact('orders', 'status', 'stats'));
    }

    /**
     * Show order details
     */
    public function showOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.sections.orders-show', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
        ]);
        
        $order->update($validated);
        return redirect()->back()->with('success', 'Order status updated!');
    }

    /**
     * Store a new order from public form (API endpoint)
     */
    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_whatsapp' => 'nullable|string|max:20',
            'customer_email' => 'nullable|email',
            'delivery_address' => 'required|string|max:500',
            'city' => 'nullable|string|max:100',
            'necklace_size' => 'nullable|string|max:100',
            'product_name' => 'required|string|max:255',
            'material_option' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'making_charge' => 'required|numeric|min:0',
            'delivery_charge' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:100',
            'special_notes' => 'nullable|string|max:1000',
        ]);
        
        // Generate order number
        $validated['order_number'] = Order::generateOrderNumber();
        
        // Create order
        $order = Order::create($validated);
        
        return response()->json([
            'success' => true,
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'message' => 'Order created successfully'
        ]);
    }

    /**
     * Delete an order
     */
    public function deleteOrder($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Order deleted!');
    }
}

