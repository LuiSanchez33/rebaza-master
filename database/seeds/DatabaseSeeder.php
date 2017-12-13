<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Quotes;
use App\Office;
use App\OtherImages;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('LawyerTableSeeder');
		$this->call('PageTableSeeder');
		$this->call('QuoteTableSeeder');
		$this->call('OfficeTableSeeder');
		$this->call('OtherImagesSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create(['name' => 'Admin Rebaza', 'password' => bcrypt('admin'), 'email' => 'admin@rebaza.com']);
    }
}

class LawyerTableSeeder extends Seeder {

    public function run()
    {
        $insert = [
            'name' => 'Alberto Rebaza',
            'email' => 'alberto.rebaza@rebaza-alcazar.com',
            'image' => 'alberto.jpg',

            'download_cv_es' => 'ARTCVes.pdf',
            'download_cv_en' => 'ARTen2015.pdf',

            'download_txt_es' => 'Descargar',
            'download_txt_en' => 'Download',

            'job_es' => 'Socio Principal',
            'job_en' => 'Primary Partner',
            'type' => 1,

            'list_es' => '[{"list":"\u00c1reas","items_es":["<a href=\"http:\/\/www.rebaza-alcazar.com\/areafunciones\">Fusiones y Adquisiciones<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areamercado\">Mercado de Valores<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/arealibre\">Libre Competencia y Competencia Desleal<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areacorporativo\">Corporativo<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areaprivate\">Private Clients<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areaventure\">Venture Capital<\/a>"]},{"list":"Educaci\u00f3n","items_es":["Abogado por la Pontificia Universidad Cat\u00f3lica del Per\u00fa, 1993. Summa Cum Laude.","Master en Derecho por University of Virginia School of Law (EEUU), 1995."]},{"list":"Distinciones","items_es":["Director de Amrop Per\u00fa S.A.C., Angel Ventures y Rigel Per\u00fa S.A.","Miembro del Patronato del Museo de Lima","Miembro del Comit\u00e9 de Adquisiciones de Arte del Museo de Arte de Lima (MALI)","Miembro Young President\u2019s Organization (YPO).","Mentor de Wayra","Chambers & Partners - Fusiones y Adquisiciones: Banda 1 - Derecho Bancario y Financiero: Banda 2","\u00c1rbitro, C\u00e1mara de Comercio de Lima","\u00c1rbitro, Centro de Arbitraje de la Pontificia Universidad Cat\u00f3lica (PUCP)","\u00c1rbitro, American Chamber of Commerce (AMCHAM)","akjhvdhas"]},{"list":"Idiomas","items_es":["Espa\u00f1ol e Ingl\u00e9s"]}]',
            'list_en' => '[{"list":"Practiques","items_en":["<a href=\"http:\/\/www.rebaza-alcazar.com\/areafunciones\">Mergers and Acquisitions<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areamercado\">Capital Markets<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/arealibre\">Free and unfair competition<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areacorporativo\">Corporate<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areaprivate\">Private Clients<\/a>","<a href=\"http:\/\/www.rebaza-alcazar.com\/areaventure\">Venture Capital<\/a>"]},{"list":"Educaci\u00f3n","items_en":["Abogado por la Pontificia Universidad Cat\u00f3lica del Per\u00fa, 1993. Summa Cum Laude.","Master en Derecho por University of Virginia School of Law (EEUU), 1995."]},{"list":"Distinctions","items_en":["Director de Amrop Per\u00fa S.A.C., Angel Ventures y Rigel Per\u00fa S.A.","Miembro del Patronato del Museo de Lima","Miembro del Comit\u00e9 de Adquisiciones de Arte del Museo de Arte de Lima (MALI)","Miembro Young President\u2019s Organization (YPO).","Mentor de Wayra","Chambers & Partners - Mergers and Acquisitions: Banda 1 - Derecho Bancario y Financiero: Banda 2","\u00c1rbitro, C\u00e1mara de Comercio de Lima","\u00c1rbitro, Centro de Arbitraje de la Pontificia Universidad Cat\u00f3lica (PUCP)","\u00c1rbitro, American Chamber of Commerce (AMCHAM)"]},{"list":"Languages","items_en":["Spanish and English"]}]',

            'info_es' => "<p class=\"txtblue text-bold\" style=\"box-sizing: border-box; margin: 11px 0px 0px; color: #36a9e1; font-weight: bold; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif;\">Oficina de Lima</p><p class=\"sinespacio\" style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">T: 4425100<br style=\"box-sizing: border-box;\" />F: 4425100 A: 224<br style=\"box-sizing: border-box;\" /><a class=\"correo\" style=\"box-sizing: border-box; background-color: transparent; color: #474747; text-decoration-line: none;\" href=\"mailto:alberto.rebaza@rebaza-alcazar.com\">alberto.rebaza@rebaza-alcazar.com</a></p><p class=\"txtblue text-bold\" style=\"box-sizing: border-box; margin: 11px 0px 0px; color: #36a9e1; font-weight: bold; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif;\">Secretaria</p><p class=\"sinespacio\" style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Rocio Paredes<br style=\"box-sizing: border-box;\" /><a class=\"correo\" style=\"box-sizing: border-box; background-color: transparent; color: #474747; text-decoration-line: none;\" href=\"mailto:rocio.paredes@rebaza-alcazar.com\">rocio.paredes@rebaza-alcazar.com</a><br style=\"box-sizing: border-box;\" />T: 4425100 A: 224</p>",
            'info_en' => "<p class=\"txtblue text-bold\" style=\"box-sizing: border-box; margin: 11px 0px 0px; color: #36a9e1; font-weight: bold; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif;\">Lima Office</p>\r\n<p class=\"sinespacio\" style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">T: 4425100<br style=\"box-sizing: border-box;\" />F: 4425100 A: 224<br style=\"box-sizing: border-box;\" /><a class=\"correo\" style=\"box-sizing: border-box; background-color: transparent; color: #474747; text-decoration-line: none;\" href=\"mailto:alberto.rebaza@rebaza-alcazar.com\">alberto.rebaza@rebaza-alcazar.com</a></p>\r\n<p class=\"txtblue text-bold\" style=\"box-sizing: border-box; margin: 11px 0px 0px; color: #36a9e1; font-weight: bold; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif;\">Secretary</p>\r\n<p class=\"sinespacio\" style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Rocio Paredes<br style=\"box-sizing: border-box;\" /><a class=\"correo\" style=\"box-sizing: border-box; background-color: transparent; color: #474747; text-decoration-line: none;\" href=\"mailto:rocio.paredes@rebaza-alcazar.com\">rocio.paredes@rebaza-alcazar.com</a><br style=\"box-sizing: border-box;\" />T: 4425100 A: 224</p>",

            'text_es' => "<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Alberto Rebaza es socio fundador y managing partner de Rebaza, Alc&aacute;zar &amp; De Las Casas. Socio lider del &aacute;rea de fusiones y adquisiciones y de finanzas corporativas. En adici&oacute;n a su maestr&iacute;a, cuenta con estudios en Georgetown University y en Inglaterra.</p>\r\n<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Alberto ha sido permanentemente considerado por los principales rankings legales como abogado l&iacute;der en M&amp;A y Banca y Financiamiento. Estas publicaciones incluyen a Chambers &amp; Partners, IFRL 1000, Who&acute;s Who Legal y Latin Lawyer entre otras. Latin Lawyer incluy&oacute; a Alberto en el 2004 en su \"Top 20 menores de 40\" lista de los abogados menores de 40 a&ntilde;os que gozan del m&aacute;s alto reconocimiento. A su vez Chambers &amp; Partners lo consider&oacute; &ldquo;como la voz l&iacute;der para las grandes transacciones financieras y M&amp;A&rdquo;.</p>\r\n<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Ha sido expositor en diferentes conferencias de International Bar Association &ndash; IBA en Dublin, San Paulo, Bogot&aacute;, Panam&aacute;; Latin Laywer en Barcelona, NYC, M&eacute;xico, Bogot&aacute;, Dublin, Singapur.</p>\r\n<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Muy involucrado en el mundo de las artes; Alberto es miembro del patronato del Museo de Arte de Lima, y presidente del Comit&eacute; de Adquisiciones de Arte Contempor&aacute;neo (CAAC MALI) y Artecho.</p>",
            'text_en' => "<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Alberto Rebaza is founding partner and managing partner of Rebaza, Alcazar &amp; De Las Casas law firm. Partner leads to mergers and acquisitions and corporate areas. In addition to his masters, he has studies at Georgetown University and England.</p>\r\n<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Alberto has been consistently considered by legal rankings as a leading lawyer in M&amp;A, Banking and Finance. These publications include Chambers &amp; Partners, IFRL 1000, Who\'s Who Legal and LatinLawyer, among others. LatinLawyer included Alberto in 2004 in its \"Top 20 under 40\" list of lawyers under 40 who enjoy the highest recognition. Also, Chambers &amp; Partners called him \"as the leading voice for large financial transactions and M&amp;A\".</p>\r\n<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">He has been a speaker at different conferences of the International Bar Association &ndash; IBA in Dublin, San Paulo, Bogot&aacute;, Panam&aacute;; LatinLaywer in Barcelona, NYC, M&eacute;xico, Bogota, Dublin, Singapur.</p>\r\n<p style=\"box-sizing: border-box; margin: 11px 0px 0px; text-align: justify; padding: 0px; font-size: 11px; line-height: 1.6; font-family: Verdana, Geneva, sans-serif; color: #111111;\">Very much involved in the arts world, Alberto is a board member of the Museum of Art of Lima, and is chair of the Acquisition Committee of Contemporary Art (CAAC MALI) and Artecho.</p>"
        ];

        \App\Lawyer::create($insert);
    }
}

class PageTableSeeder extends Seeder {

    public function run()
    {
        \App\Page::create([
            'id' => 1,
            'type' => 4,
            'name_es' => 'Experiencia reciente',
            'name_en' => 'Recent Experience',
            'text_es' => '<p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">Asesoramos a Veritas Capital en la adquisici&oacute;n del negocio de servicios del conglomerado de ingenier&iacute;a petrolera Chicago Bridge &amp; Iron Company (CB&amp;I), por USD 755 millones.</p>
                <p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">Asesoramos a la desarrolladora de central hidroel&eacute;ctrica, La Virgen en obtener un financiamiento hasta por la suma de US$ 80 millones otorgado por la multilateral Corporaci&oacute;n Andina de Fomento &ndash; CAF y Deutsche Investitions &ndash; DEG.</p>
                <p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">Asesoramos junto a Sullivan y Cromwell LLP y Goodmans LLP en Nueva York a la minera canadiense HudBay en la emisi&oacute;n de una serie de bonos por valor de US$ 1.000 millones.</p>
                <p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">Asesoramos a JP Morgan a obtener la autorizaci&oacute;n para operar como banco de inversi&oacute;n en nuestro pa&iacute;s.</p>',
            'text_en' => '<p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">We advised Veritas Capital in the acquisition of the services business of the Chicago Bridge &amp; Iron Company (CB &amp; I) for $ 755 million.</p>
                <p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">We advised the hydropower plant developer, La Virgen S.A., on the sign of an US$ 80 million project finance facility to be granted by the multilateral Corporaci&oacute;n Andina de Fomento - CAF and Deutsche Investitions &ndash; DEG.</p>
                <p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">We advised together with Sullivan and Cromwell LLP and Goodmans LLP in New York in the emission of a series of bonds worth US $ 1 billion for the Canadian mining company HudBay.</p>
                <p style="box-sizing: border-box; margin: 10px 0px 0px; text-align: justify; line-height: 1.1; padding-bottom: 0px; color: #111111; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13.6px; background-color: #fdfdfd;">We advise JP Morgan to obtain authorization to operate as an investment bank in our country.</p>'
        ]);
    }
}

class QuoteTableSeeder extends Seeder {

    public function run()
    {
        $inserts = [
            [
                'name' => 'Alberto Rebaza',
                'message_es' => '“Nuestro temperamento es un factor diferencial muy importante; pues poseemos una verdadera pasión y energía por lo que hacemos”',
                'message_en' => '“Our temperament is a very important differential factor, because we put real passion and energy for what we do”',
                'rol_es' => '(Socio Principal)',
                'rol_en' => '(Main Partner)',
            ],
            [
                'name' => 'Rafael Alcázar',
                'message_es' => '“Nuestro trabajo tiene como cimiento la profesionalidad a la vez que cuidar de los intereses de nuestros clientes”',
                'message_en' => '“Our work is based on professionalism while taking care of the clients’ interests.”',
                'rol_es' => '(Socio Principal)',
                'rol_en' => '(Main Partner)',
            ],
            [
                'name' => 'Gonzalo De las Casas',
                'message_es' => '“Somos una organización que se enorgullece del servicio que brinda a sus clientes.”',
                'message_en' => '“We are an organization that is very proud of the service we  provide to our clients”',
                'rol_es' => '(Socio Principal)',
                'rol_en' => '(Main Partner)',
            ],
            [
                'name' => 'Daniela Urquiza',
                'message_es' => '“Formar parte del RAD ha elevado mi estándar profesional. Brindar un servicio legal integral, de calidad, e innovador es nuestra prioridad.”',
                'message_en' => '“Being part of the Firm has raised my professional standards. Providing a comprehensive, quality and innovative legal service is our priority.”',
                'rol_es' => '(Asociada)',
                'rol_en' => '(Associate)',
            ]
        ];

        foreach ($inserts as $insert) {
            Quotes::create($insert);
        }
    }
}

class OfficeTableSeeder extends Seeder {

	public function run()
	{
		Office::create([
			'place' => 'Lima',
			'info_es' => 'Canaval y Moreyra 452 pisos 9, 14, 15 y 17<br> 
						San Isidro - Lima 27 <br>
						Teléfono (511) 442-5100<br> 
						Fax (511) 442-5100 - 237',

			'info_en' => 'Canaval y Moreyra 452 floors 9, 14, 15 y 17<br> 
						San Isidro - Lima 27 <br>
						Phone (511) 442-5100<br> 
						Fax (511) 442-5100 - 237'
		]);
	}
}

class OtherImagesSeeder extends Seeder {

	public function run()
	{
		$params = [
			// Sidebar right images
			['image' => 'chambers2016.png', 'type' => 1],
			['image' => 'latin.png', 'type' => 1],
			['image' => 'iflr.jpg', 'type' => 1],
			['image' => '1000.jpg', 'type' => 1],

			// Logos
			['image' => 'logo_linkedin.png', 'type' => 2, 'link' => 'https://www.linkedin.com/company/rebaza-alcazar-&-de-las-casas-abogados-financieros']
		];

		foreach ($params as $value) {
			OtherImages::create($value);
		}
	}

}