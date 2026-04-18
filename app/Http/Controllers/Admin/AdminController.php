<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHeroRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Requests\StoreCarouselRequest;
use App\Http\Requests\StoreOrderRequest as UpdateCarouselRequest;
use App\Http\Requests\StorePublicOrderRequest;
use App\Models\HeroSection;
use App\Models\ProductDetail;
use App\Models\MaterialOption;
use App\Models\SizeOption;
use App\Models\ContactInfo;
use App\Models\CarouselSlide;
use App\Models\Order;
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

    public function updateHero(UpdateHeroRequest $request)
    {
        $hero = HeroSection::first() ?? new HeroSection();
        $hero->fill($request->validated())->save();

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

    public function updateProduct(UpdateProductRequest $request)
    {
        $product = ProductDetail::first() ?? new ProductDetail();
        $product->fill($request->validated())->save();

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

    public function storeMaterial(StoreMaterialRequest $request)
    {
        MaterialOption::create($request->validated());
        return redirect()->route('admin.material.index')->with('success', 'Material option created!');
    }

    public function editMaterial($id)
    {
        $material = MaterialOption::findOrFail($id);
        return view('admin.sections.material-form', compact('material'));
    }

    public function updateMaterial(UpdateMaterialRequest $request, $id)
    {
        $material = MaterialOption::findOrFail($id);
        $material->update($request->validated());
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

    public function storeSize(StoreSizeRequest $request)
    {
        SizeOption::create($request->validated());
        return redirect()->route('admin.size.index')->with('success', 'Size option created!');
    }

    public function editSize($id)
    {
        $size = SizeOption::findOrFail($id);
        return view('admin.sections.size-form', compact('size'));
    }

    public function updateSize(UpdateSizeRequest $request, $id)
    {
        $size = SizeOption::findOrFail($id);
        $size->update($request->validated());
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

    public function updateContact(UpdateContactRequest $request)
    {
        $contact = ContactInfo::first() ?? new ContactInfo();
        $contact->fill($request->validated())->save();

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

    public function storeCarousel(StoreCarouselRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('carousel', 'public');
        }

        CarouselSlide::create($data);
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide created!');
    }

    public function editCarousel($id)
    {
        $slide = CarouselSlide::findOrFail($id);
        return view('admin.sections.carousel-form', compact('slide'));
    }

    public function updateCarousel(UpdateCarouselRequest $request, $id)
    {
        $slide = CarouselSlide::findOrFail($id);
        $data = $request->validated();

        // Handle image upload - delete old image if new one is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($slide->image_path && Storage::disk('public')->exists($slide->image_path)) {
                Storage::disk('public')->delete($slide->image_path);
            }
            $data['image_path'] = $request->file('image')->store('carousel', 'public');
        }

        $slide->update($data);
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
    public function storeOrder(StorePublicOrderRequest $request)
    {
        // Generate order number
        $data = $request->validated();
        $data['order_number'] = Order::generateOrderNumber();
        
        // Create order
        $order = Order::create($data);
        
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

