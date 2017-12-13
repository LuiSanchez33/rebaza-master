<?php namespace App\Http\Controllers;

use App\Gallery;
use App\Office;
use App\Quotes;
use App\RseGallery;
use Illuminate\Http\Request;
use Cache;
use App\Article;
use App\Lawyer;
use App\OtherImages;
use App\Http\Requests\SendCvRequest;
use File;
use Mail;
use App\Page;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	private $fields = array('title_es', 'title_en', 'imagen', 'desc_es', 'desc_en');

	private $locale = '';

	private $pages;

	private $socials;

	public function __construct()
    {
        if (Cache::has('locale')) {
            $this->locale = Cache::get('locale') == 'en' ? Cache::get('locale') : 'es';
        } else {
			$this->locale = 'es';
			Cache::forever('locale', $this->locale, 17200);
		}

        $pages = Page::all(['id', 'page_slug', 'name_es', 'name_en', 'type']);

        $areas = $pages->where('type', 'AREAS')->toArray();
        $estudios = $pages->where('type', 'ESTUDIO')->toArray();
        $trabaja = $pages->find(30)->toArray();

        $this->pages = ['estudios' => $estudios, 'areas' => $areas, 'trabaja' => $trabaja];

        $this->socials = OtherImages::where('type', 2)->latest()->get(['link', 'image']);
    }

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::where('status', 2)->latest()->get($this->fields)->toArray();
		$homeData = Page::find(1);

		$locale = $this->locale;
		$pages = $this->pages;

		$quotes = Quotes::latest()->get();

		$sidebarImages = OtherImages::where('type', 1)->latest()->get(['image']);
		$socialIcons = $this->socials;

		return view('index', compact('articles', 'locale', 'homeData', 'pages', 'quotes', 'sidebarImages', 'socialIcons'));
	}

	public function abogadoasociados()
	{
        $asociados = Lawyer::where('type', 2)->orderBy('name')->get();
        $locale = $this->locale;
        $pages = $this->pages;
		$socialIcons = $this->socials;

		return view('abogadoasociados', compact('asociados', 'locale', 'pages', 'socialIcons'));
	}

	public function abogadoconsultores()
	{
        $consultores = Lawyer::where('type', 3)->orderBy('name')->get();
        $locale = $this->locale;
        $pages = $this->pages;
		$socialIcons = $this->socials;

		return view('abogadoconsultores', compact('consultores', 'locale', 'pages', 'socialIcons'));
	}

	public function abogadosocios()
	{
	    $socios = Lawyer::where('type', 1)->orderBy('name')->get();
        $locale = $this->locale;
        $pages = $this->pages;
		$socialIcons = $this->socials;

		return view('abogadosocios', compact('socios', 'locale', 'pages', 'socialIcons'));
	}

    public function pages($page_slug)
    {
        $locale = $this->locale;
        $page = Page::where('page_slug', $page_slug)->first();
        $pages = $this->pages;
		$socialIcons = $this->socials;

        return view('pages', compact('page', 'locale', 'pages', 'socialIcons'));
    }

	public function galeria()
	{
        $locale = $this->locale;
        $pages = $this->pages;

        $galleries = Gallery::all();
		$socialIcons = $this->socials;

		return view('galeria', compact('locale', 'pages', 'galleries', 'socialIcons'));
	}

	public function oficinas()
	{
        $locale = $this->locale;
        $pages = $this->pages;

        $offices = Office::all();
		$socialIcons = $this->socials;

		return view('oficinas', compact('locale', 'pages', 'offices', 'socialIcons'));
	}

	public function reconocimiento()
	{
        $articles = Article::where('status', 1)->latest()->paginate(12, $this->fields);

        $locale = $this->locale;
        $pages = $this->pages;
		$socialIcons = $this->socials;

		return view('reconocimiento', compact('articles', 'locale', 'pages', 'socialIcons'));
	}

	public function responsabilidadsocial()
	{
		$rseGalleries = RseGallery::all();

        $locale = $this->locale;
        $pages = $this->pages;
		$socialIcons = $this->socials;

		return view('responsabilidadsocial', compact('locale', 'pages', 'socialIcons', 'rseGalleries'));
	}

	public function trabaja()
	{
        $locale = $this->locale;
        $pages = $this->pages;
		$socialIcons = $this->socials;

		return view('trabaja', compact('locale', 'pages', 'socialIcons'));
	}

	public function trabajaformulario()
	{
        $locale = $this->locale;
        $pages = $this->pages;
		$socialIcons = $this->socials;

		return view('trabajaformulario', compact('locale', 'pages', 'socialIcons'));
	}

	public function changeLocale(Request $request)
	{
		$locale = $request->input('locale');

		Cache::forever('locale', $locale, 17200);

		return redirect()->back();
	}

	public function sendCv(SendCvRequest $request) {

        $data = $request->all();
        $data['cv'] = $request->file('cv')->getClientOriginalName();
        $request->file('cv')->move('cv', $data['cv']);

        Mail::send('emails.sendcv', $data, function($message) use ($data)
        {
            $message->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'))->to(env('MAIL_TO'))->subject('CV de ' . $data['nombre']);

            $message->attach('cv/' . $data['cv']);
        });

        File::delete('cv/' . $data['cv']);

        return redirect()->back()->with('success', trans('links.success_message_cv'));
    }
}
