<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Advantage;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Delivery;
use App\Models\Diler;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Partner;
use App\Models\Post;
use App\Models\ShopBrand;
use App\Models\ShopCategory;
use App\Models\ShopProduct;
use App\Models\SubMenu;
use App\Models\Technologic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function home($lang = 'ru')
    {
        if ($lang) {
            session(['lang' => $lang]);
            App::setLocale($lang);
        }
        $menu = Menu::where('slug', 'home')->firstOrFail();
        $metaTitle =SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_title_'.$lang};
        $metaDescription=SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_description_'.$lang};
        $metaDescription = strip_tags($metaDescription);
        $language=Language::where('short_name',$lang)->first();
        if (!$language) {
            $language = Language::where('short_name', 'ru')->first();
        }


        $dillers=Diler::all();
        $contact=Contact::where('language_id', $language->id)->latest()->first();
        $categories=ShopCategory::where('is_visible', 1)->latest()->get();
        $banners=Banner::all();
        $advantages = Advantage::latest()->take(3)->get();
        $products=ShopProduct::where('is_visible', true)->latest()->take(12)->get();
        $experiences=Experience::latest()->take(3)->get();
        $partners=Partner::all();


        return view('home', compact('categories', 'contact',    'banners', 'advantages', 'products', 'experiences', 'partners', 'metaTitle', 'metaDescription', 'dillers' ));
    }



public function about($lang)
{   $menu = Menu::where('slug', 'about')->firstOrFail();
    $metaTitle =SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_title_'.$lang};
    $metaDescription=SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_description_'.$lang};
    $metaDescription = strip_tags($metaDescription);
    $about=About::latest()->first();
    $experiences=Experience::latest()->take(3)->get();
    $partners=Partner::all();
    return view('about', compact('about', 'experiences', 'partners', 'metaTitle', 'metaDescription'));
}


public function products($lang)
{
    $menu = Menu::where('slug', 'products')->firstOrFail();
    $metaTitle =SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_title_'.$lang};
    $metaDescription=SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_description_'.$lang};
    $metaDescription = strip_tags($metaDescription);
    $products = ShopProduct::orderBy('updated_at', 'desc')->paginate(6);
    $categories=ShopCategory::all();
    $technicals=Technologic::all();
    return view('products', compact('products', 'categories', 'technicals', 'metaTitle', 'metaDescription'));
}


public function product($lang, $slug)
{
    $product=ShopProduct::where('slug_'.$lang, $slug)->first();
    $contact=Contact::latest()->first();
    $products=ShopProduct::where('technologic_id', $product->technologic_id) ->where('id', '!=', $product->id)  ->take(5)
        ->get();
    $metaTitle = $product->{'meta_name_'.$lang};
    $metaDescription = $product->{'meta_description_'.$lang};
    return view('product-detail', compact('product', 'metaTitle', 'metaDescription', 'products', 'contact'));
}

public function delivery($lang)
{
    $menu = Menu::where('slug', 'delivery')->firstOrFail();
    $metaTitle =SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_title_'.$lang};
    $metaDescription=SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_description_'.$lang};
    $metaDescription = strip_tags($metaDescription);
    $language=Language::where('short_name',$lang)->first();
    if (!$language) {
        $language = Language::where('short_name', 'ru')->first();
    }
    $contact=Contact::where('language_id', $language->id)->latest()->first();
    $deliveries=Delivery::all();
    return view('delivery', compact('deliveries', 'language', 'contact', 'metaTitle', 'metaDescription'));
}


public function news($lang)
{

    $menu = Menu::where('slug', 'news')->firstOrFail();
    $metaTitle =SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_title_'.$lang};
    $metaDescription=SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_description_'.$lang};
    $metaDescription = strip_tags($metaDescription);
    $language = Language::where('short_name', $lang)->first();

    $news = Post::where('language_id', $language->id)
        ->latest()
        ->paginate(6);

    return view('blog', compact('news',  'metaTitle', 'metaDescription'));
}
public function newDetail($lang, $slug)
{

    $lang = app()->getLocale();
    $language = Language::where('short_name', $lang)->first();
    $new=Post::where('slug', $slug)->first();
    $metaTitle = $new->meta_title;
    $metaDescription = $new->meta_description;
    $news = Post::where('id', '!=', $new->id)
        ->where('category_id', $new->category_id)
        ->where('language_id', $language->id)
        ->latest()
        ->take(3)
        ->get();
    return view('blog_detail', compact('new', 'news', 'metaTitle', 'metaDescription'));
}

    public function category($lang, $slug)
    {
        $categories = ShopCategory::all();
        $technicals = Technologic::all();
        $products = null;
        $currentCategory = null;
        $currentTechnical = null;
        if ($currentCategory = ShopCategory::where('slug_' . $lang, $slug)->first()) {
            $products = $currentCategory->products()->paginate(6);
            $metaTitle=$currentCategory->{'meta_title_'.$lang};
            $metaDescription=$currentCategory->{'meta_description_'.$lang};
        } elseif ($currentTechnical = Technologic::where('slug_' . $lang, $slug)->first()) {
            $products =ShopProduct::where('technologic_id', $currentTechnical->id)->paginate(6);
            $metaTitle=$currentTechnical->{'meta_title_'.$lang};
            $metaDescription=$currentTechnical->{'meta_description_'.$lang};
        } else {
            abort(404);
        }
        return view('category', [
            'currentCategory' => $currentCategory,
            'metaTitle'=>$metaTitle,
            'metaDescription'=>$metaDescription,
            'currentTechnical' => $currentTechnical,
            'products' => $products,
            'lang' => $lang,
            'technicals' => $technicals,
            'categories' => $categories,
        ]);
    }
    public function search($query)
    {
        $lang = app()->getLocale();

        $categories = ShopCategory::where("name_{$lang}", 'LIKE', "%{$query}%")->get();
        $products = ShopProduct::where("name_{$lang}", 'LIKE', "%{$query}%")->get();
        $technicals = Technologic::where("name_{$lang}", 'LIKE', "%{$query}%")->get();


        $results = collect();

        $results = $results->merge($categories->map(function ($category) use ($lang) {
            return [
                'name' => $category->{"name_{$lang}"},
                'url' => route('category', ['lang' => $lang, 'slug' => $category->{"slug_{$lang}"}]),
                'type' => 'category'
            ];
        }));

        $results = $results->merge($products->map(function ($product) use ($lang) {
            return [
                'name' => $product->{"name_{$lang}"},
                'url' => route('product', ['lang' => $lang, 'slug' => $product->{"slug_{$lang}"}]),
                'type' => 'product'
            ];
        }));

        $results = $results->merge($technicals->map(function ($technical) use ($lang) {
            return [
                'name' => $technical->{"name_{$lang}"},
                'url' => route('category', ['lang' => $lang, 'slug' => $technical->{"slug_{$lang}"}]),
                'type' => 'technical'
            ];
        }));

        return response()->json(['results' => $results]);
    }


    public function contact($lang)
    {
        $lang = app()->getLocale();
        $language = Language::where('short_name', $lang)->first();
        $menu = Menu::where('slug', 'contact')->firstOrFail();
        $metaTitle =SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_title_'.$lang};
        $metaDescription=SubMenu::where('menu_id', $menu->id)->firstOrFail()->{'meta_description_'.$lang};
        $metaDescription = strip_tags($metaDescription);


        $contact = Contact::where('language_id', $language->id)->latest()->first();
        return view('contact', compact('contact',  'metaTitle', 'metaDescription'));

    }



    public function submit(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $phone2 = $request->input('phone2');
        $message = $request->input('message');

        $botToken = '7618191831:AAHgn8w1FiMl6VO7dbz9uEPCAgSU71x6Clo';
        $chatId = '-1002437192336';

        // Matnni tayyorlash
        $text = "Foydalanuvchidan yangi xabar:\n\n" .
            "Ismi: $name\n" .
            "Email manzili: $email\n" .
            "Telefon  raqami: $phone\n" .
            "Qo'shimcha telefon  raqami: $phone2\n" .
            "Xabar: $message";

        // Telegram API URL
        $apiURL = "https://api.telegram.org/bot$botToken/sendMessage";

        // Curl orqali so'rov yuborish
        $data = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML'
        ];

        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        // Xato xabarini tekshirish
        if ($result === FALSE) {
            // Xato xabarini ko'rsatish
            return redirect()->back()->with('error', 'Error sending message');
        } else {
            return redirect()->back()->with('success', 'Your message has been sent!');
        }
    }


}
